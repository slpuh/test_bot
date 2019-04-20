<?php
namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;

class StartCommand extends Command
{
    protected $name = 'start';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        $this->replyWithMessage([
            'text' => 'Привет, добро пожаловать! Я справлюсь с тестовым заданием '.hex2bin('f09f9880'),            
        ]);
        
        $this->replyWithMessage([
            'text' => 'Давай познакомимся, как тебя зовут?',            
        ]); 
    }
}