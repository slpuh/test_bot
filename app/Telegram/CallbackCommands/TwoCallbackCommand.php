<?php
namespace App\Telegram\CallbackCommands;


class TwoCallbackCommand extends CallbackCommand
{
    protected $name = 'two';  
    
    public function getParameters() 
    {

    }

    public function setParameters($params)
    {

    }

    public function handle()
    {
        //$this->answerCallbackQuery();
        //$this->editMessageText(['text' => 'Нет данных']);
       
    }
}
