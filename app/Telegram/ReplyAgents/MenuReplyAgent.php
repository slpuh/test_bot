<?php
namespace App\Telegram\ReplyAgents;

class MenuReplyAgent extends AbstractReplyAgent
{
    protected $name = 'menu';

    public function handle()
    {
        $message = $this->getUpdate()->getMessage()->getText(); 
        
        $contact = $this->getUpdate()->getMessage()->getContact()['phone_number'];
        
        if ($message) {            
            $this->getTelegram()->triggerCommand('contact', $this->getUpdate());
            return false;        
        } 
        if ($contact) {            
            $this->getTelegram()->triggerCommand('select', $this->getUpdate());
            return false;        
        }    
        return true;
    }
}
