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
      $telegram = Telegram::getWebhookUpdates()['message'];
      //file_put_contents('log.txt', print_r($telegram, true));
      if(!TelegramUser::find($telegram['from']['id'])) {
        TelegramUser::create(json_decode($telegram['from'], true));
      }

      $update = Telegram::commandsHandler(true);
      
      if ($update->getMessage()) {
        $text = $update->getMessage()->getText();
        if (strlen($text) > 0 && substr($text, 0, 1) != '/') {
            $supervisor = app(ReplyAgentsSupervisor::class);            
            $supervisor->handle($update);
            
        }
    }      
 }
}
