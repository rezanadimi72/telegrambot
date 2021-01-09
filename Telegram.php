<?php

namespace rezanadimi\telegram;
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

/**
 * Class Telegram
 * @package rezanadimi\telegram
 * @var $callback Callback;
 * @var $message Callback;
 */
class Telegram
{
    private $API_KEY = null;
    private $telegramUrl;
    private $input;
    public $message;
    public $callback;

    public function __construct($your_api_key)
    {
        if ($this->is_message())
            $this->message = new Message();
        if ($this->is_callback())
            $this->callback = new Callback();
        $this->API_KEY = $your_api_key;
        $this->telegramUrl = 'https://api.telegram.org/bot' . $this->API_KEY . '/';
    }

    public function getInput()
    {
        $input = file_get_contents("php://input");
        $this->input = json_decode($input, true);
        return $this->input;
    }

    public function is_callback()
    {
        $input = $this->getInput();
        if (!empty($input['callback_query']))
            return true;
        else
            return false;
    }

    public function is_message()
    {
        $input = $this->getInput();
        if (!empty($input['message']))
            return true;
        else
            return false;
    }


    public function sendMessage($data)
    {
        return $this->curlExecute('sendMessage', $data);
    }

    public function deleteMessage($data)
    {
        return $this->curlExecute('deleteMessage', $data);
    }

    public function editMessageReplyMarkup($data)
    {
        return $this->curlExecute('editMessageReplyMarkup', $data);
    }

    public function sendPhotoByUrl($data)
    {
        return $this->curlExecute('sendPhoto', $data);
    }

    public function sendVideoByUrl($data)
    {
        return $this->curlExecute('sendVideo', $data);
    }

    private function curlExecute($action, $data)
    {
        $url = $this->telegramUrl . $action;
        try {
            $ch = curl_init();
            if (FALSE === $ch)
                throw new Exception('failed to initialize');
            $data_string = json_encode($data);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data_string))
            );

            $content = curl_exec($ch);

            if (FALSE === $content)
                throw new Exception(curl_error($ch), curl_errno($ch));
            return true;
        } catch (Exception $e) {

            trigger_error(sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage()),
                E_USER_ERROR);
            return false;

        }
    }


}
