<?php
namespace App\Telegram\CallbackCommands;

use Telegram\Bot\Keyboard\Keyboard;

class OneCallbackCommand extends CallbackCommand
{
    protected $name = 'one'; 
    
    public function getParameters() 
    {

    }

    public function setParameters($params)
    {

    }
    
    public function handle()    {
        
        $keyboard = Keyboard::make()->inline();

        $button1 = Keyboard::inlineButton([
            'text' => '1',
            'callback_data' => '',
        ]);   
         
       
        $button2 = Keyboard::inlineButton([
            'text' => '2',
            'callback_data' => '2',
        ]);        
        
        $button3 = Keyboard::inlineButton([
            'text' => '3',
            'callback_data' => '3',
        ]);
        
        $keyboard->row($button1, $button2, $button3);        

        $this->replyWithMessage([
            'text' => 'Отлично! А теперь выбери к какой категории пользователей тебя отнести',
            'reply_markup' => $keyboard,
        ]);   
    }
}
