<?php
namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;

class ContactCommand extends Command
{
    protected $name = 'contact';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        $keyboard = Keyboard::make([
            'resize_keyboard' => true,
             'one_time_keyboard' => true            
             ]);
        
        $button = Keyboard::button([
            'text' => 'Отправить контакт',            
            'request_contact' => true,
            
        ]);
        
        $keyboard->row($button);         
                
        $this->replyWithMessage([            
            'text' => 'Для начала использования отправь мне свой контакт',
            'reply_markup' => $keyboard,                         
            ]);         
    }
}