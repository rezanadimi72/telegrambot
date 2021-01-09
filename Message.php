<?php

namespace rezanadimi\telegrambot\telegram;
class Message
{
    public $updateID;
    public $messageID;
    public $userID;
    public $firstName;
    public $userName;
    public $chatID;
    public $chatType;
    public $dateChat;
    public $chatText;
    private $input;

    public function __construct()
    {
        $this->getInput();
        $post = $this->input;
        $this->updateID = $post["update_id"];
        $this->messageID = $post["message"]['message_id'];
        $this->userID = $post["message"]['from']['id'];
        $this->firstName = $post["message"]['from']['first_name'];
        $this->userName = @$post["message"]['from']['username'];
        $this->chatID = $post["message"]['chat']['id'];
        $this->chatType = $post["message"]['chat']['type'];
        $this->dateChat = $post["message"]['date'];
        $this->chatText = $post["message"]['text'];
    }

    private function getInput()
    {
        $input = file_get_contents("php://input");
        $this->input = json_decode($input, true);
        return $this->input;
    }
}

