<?php
namespace App\Telegram\CallbackCommands;


class TwoCallbackCommand extends CallbackCommand
{
    protected $name = 'two';    

    public function handle()
    {
        $message = 'Поздравляю! Вы выбрали категорию ' . ucfirst($this->name) . ' теперь пришли мне фото';      
        $this->editMessageText(['text' => $message]);
       
    }
}
