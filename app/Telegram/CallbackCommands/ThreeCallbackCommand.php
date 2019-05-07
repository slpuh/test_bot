<?php
namespace App\Telegram\CallbackCommands;


class ThreeCallbackCommand extends CallbackCommand
{
    protected $name = 'three';      
    

    public function handle()    {
               
        $message = 'Поздравляю! Вы выбрали категорию ' . ucfirst($this->name) . ' </b> теперь пришли мне фото';      
        $this->editMessageText(['text' => $message]); 
        
    }
}
