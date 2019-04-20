<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Telegram;
use App\TelegramUser;
use App\Core\Telegram\CallbackCommandBus;
use App\Core\Telegram\ReplyAgentsSupervisor;

class TelegramController extends Controller
{
    public function webhook() {
      $telegram = Telegram::getWebhookUpdates();
      file_put_contents('log1.txt', print_r($telegram, true));   
      if($telegram->getMessage()) {
          if(!TelegramUser::find($telegram->getMessage()->getFrom()->getId())) {
             TelegramUser::create(json_decode($telegram->getMessage()->getFrom(), true));
          }
      }
      $update = Telegram::commandsHandler(true);

      $callbackQuery = $update->getCallbackQuery();  
        
      if ($callbackQuery) {            
            $bus = app(CallbackCommandBus::class);                       
            $data = $callbackQuery->getData();
            $user = TelegramUser::find($callbackQuery->getFrom()->getId());
            $user->update(['button' => $data]);                       
            $bus->handle($data, $update);            
            
            
      }
      
      if ($update->getMessage()) {
        $text = $update->getMessage()->getText();        
        if (strlen($text) > 0 && substr($text, 0, 1) != '/') {
            $supervisor = app(ReplyAgentsSupervisor::class);            
            $supervisor->handle($update);            
        }
        $contact = $update->getMessage()->getContact();
        if ($contact) {
            $user = TelegramUser::find($contact['user_id']);           
            $user->update(['phone_number' => $contact['phone_number']]);
            $supervisor = app(ReplyAgentsSupervisor::class);            
            $supervisor->handle($update);        
        }      
    }      
  }
}
