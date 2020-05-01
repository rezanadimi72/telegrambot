<?php

namespace rezanadimi\telegram;

class Telegram
{
    private $API_KEY = null;
    private $telegramUrl;
    private $input;

    public function __construct($your_api_key)
    {
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