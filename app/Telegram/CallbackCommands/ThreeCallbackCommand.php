<?php
namespace App\Telegram\CallbackCommands;


class ThreeCallbackCommand extends CallbackCommand
{
    protected $name = 'three';      
    
    public function getParameters() 
    {

    }

    public function setParameters($params)
    {

    }

    public function handle()
    {
        //$userId = $this->getUpdate()->getCallbackQuery()->getFrom()->getId();
        //$this->editMessageText(['text' => 'Нет данных']);
        
    }
}
