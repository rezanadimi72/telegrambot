<?php

namespace rezanadimi\telegrambot;
class Callback
{
    public $updateID;
    public $callback_query_id;
    public $from_id;
    public $from_firstname;
    public $from_username;
    public $chat_id;
    public $message;
    public $chat_instance;
    public $callback;
    private $input;

    public function __construct()
    {
        $this->getInput();
        $post = $this->input;
        $this->updateID = $post["update_id"];
        $this->callback_query_id = $post["callback_query"]['id'];
        $this->from_id = $post["callback_query"]['from']['id'];
        $this->from_firstname = $post["callback_query"]['from']['first_name'];
        $this->from_username = @$post["callback_query"]['from']['username'];
        $this->chat_id = $post["callback_query"]['message']['chat']['id'];
        $this->message = $post["callback_query"]['message'];
        $this->chat_instance = $post["callback_query"]['chat_instance'];
        $this->callback = $post["callback_query"]['data'];
    }

    private function getInput()
    {
        $input = file_get_contents("php://input");
        $this->input = json_decode($input, true);
        return $this->input;
    }
}
