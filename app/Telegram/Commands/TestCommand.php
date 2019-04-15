<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;

class TestCommand extends Command
{
    protected $name = 'test';

    protected $description = 'Test command, Get a list of commands';

    public function handle($arguments)
    {
        $keyboard = Keyboard::make(['resize_keyboard' => true]);
        
        $button1 = Keyboard::button([
            'text' => '1',
        ]);
        $button2 = Keyboard::button([
            'text' => '2',
        ]);

        $button3 = Keyboard::button([
            'text' => '3',
        ]);

        $keyboard->row($button1, $button2, $button3);
        
        $this->replyWithMessage([
            'text' => 'Test',
            'reply_markup' => $keyboard,
        ]);
    }
}
