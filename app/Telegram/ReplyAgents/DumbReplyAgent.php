<?php
namespace App\Telegram\ReplyAgents;

class DumbReplyAgent extends AbstractReplyAgent
{
    protected $name = 'dumb';

    public function handle()
    {
        $this->replyWithMessage([
            "text" => "Я не понимаю Ваше сообщения." . PHP_EOL .
                "Пожалуйста, используйте меню для взаимодействия со мной :)",
        ]);
        return false;
    }
}
