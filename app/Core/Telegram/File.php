<?php

namespace App\Core\Telegram;

use Telegram\Bot\Api;
use Telegram\Bot\Objects\Update;

class File
{
    protected $telegram;

    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
       
    }

    public function getFileId($update)
    {
        $photo = $update->getMessage()->getPhoto();
        
        $file_id =$photo[count($photo) - 1]['file_id'];

        return $file_id;
    }

    public function getFilePath($method, $uri = '', array $options = [])    {        
        
        $client = new \GuzzleHttp\Client($method, $uri, $options);
       //$result = $client->request($method, $uri, $options);       
            
        return $client->getBody();   
         
        // $file_path = https://api.telegram.org/bot
        
        
        // json_decode($this->requestToTelegram(['file_id' => $file_id], "getFile"), TRUE);
        //     // возвращаем file_path
        // return  $array['result']['file_path'];
       
    }

    public function getFile($route = '', $params, $method = 'POST') {
    	
            $client = new \GuzzleHttp\Client(['base_uri' => 'https://api.telegram.org/file/bot' .\Telegram::GetAccessToken() . '/<file_path>']);
            $result = $client->request($method, $route, $params);
            
            return $result;
    }
   
}