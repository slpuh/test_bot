<?php
namespace App\Telegram\CallbackCommands;

use Telegram\Bot\Keyboard\Keyboard;

class OneCallbackCommand extends CallbackCommand
{
    protected $name = 'one';   
    
    public function handle()    {        
             
        $message = 'Поздравляю! Вы выбрали категорию ' .  ucfirst($this->name) . ' теперь пришли мне фото';      
        $this->editMessageText(['text' => $message]);
        
    }
}
