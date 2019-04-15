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
        $keyboard = Keyboard::make(['resize_keyboard' => true]);
        
        $button1 = Keyboard::button([
            'text' => 'BTC',
        ]);
        $button2 = Keyboard::button([
            'text' => 'ETC',
        ]);

        $button3 = Keyboard::button([
            'text' => 'LTC',
        ]);

        $button4 = Keyboard::button([
            'text' => 'NEO',
        ]);

        $button5 = Keyboard::button([
            'text' => 'XRP',
        ]);

        $button6 = Keyboard::button([
            'text' => 'Setting',
        ]);

        $keyboard->row($button1, $button2, $button3)
                 ->row($button4, $button5, $button6);
        
        $this->replyWithMessage([
            'text' => 'Приветствую!',
            'reply_markup' => $keyboard,
        ]);

        //file_put_contents('log.txt', print_r(\Telegram::getWebhookUpdates(), true));
    }
}