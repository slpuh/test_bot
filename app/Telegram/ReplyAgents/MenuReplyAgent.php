<?php
namespace App\Telegram\ReplyAgents;

class MenuReplyAgent extends AbstractReplyAgent
{
    protected $name = 'menu';

    public function handle()
    {
        $message = $this->getUpdate()->getMessage()->getText();

        file_put_contents('log.txt', print_r($this, true));
        if (strpos($message, 'BTC') === 0) {            
            $this->getTelegram()->triggerCommand('test', $this->getUpdate());
            return false;
        } elseif (strpos($message, 'ETC') === 0) {
            $this->getTelegram()->triggerCommand('my', $this->getUpdate());
            return false;
        }

        return true;
    }
}
