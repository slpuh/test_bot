<?php
namespace App\Telegram\Commands;

use App\Core\Logic\OpifLogic;
use App\Telegram\CallbackCommands\OneCallbackCommand;
use App\Telegram\CallbackCommands\TwoCallbackCommand;
use App\Telegram\CallbackCommands\ThreeCallbackCommand;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;

class SelectCommand extends Command
{
    protected $name = 'select';

    protected $description = "Позоляет выбрать категорию";

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        $keyboard = Keyboard::make()->inline();

        $command = app(OneCallbackCommand::class);
        
        $button1 = Keyboard::inlineButton([
            'text' => 'Один',
            'callback_data' => $command->getCallbackData(),
        ]);        
        
        $command = app(TwoCallbackCommand::class);
        
        $button2 = Keyboard::inlineButton([
            'text' => 'Два',
            'callback_data' => $command->getCallbackData(),
        ]);
        
        $command = app(ThreeCallbackCommand::class);
        $button3 = Keyboard::inlineButton([
            'text' => 'Три',
            'callback_data' => $command->getCallbackData(),
        ]);
        
        $keyboard->row($button1, $button2, $button3);        
        
        $this->replyWithMessage([
            'text' => 'Отлично! А теперь выбери к какой категории пользователей тебя отнести',
            'reply_markup' => $keyboard,
        ]); 
              
    }
}
