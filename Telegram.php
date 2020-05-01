<?php

namespace rezanadimi\telegram;

class Telegram
{
    public $API_KEY = null;
    public $telegramUrl;

    public function __construct($your_api_key = null)
    {
        $this->API_KEY = $your_api_key;
        $this->telegramUrl = 'https://api.telegram.org/bot' . $this->API_KEY . '/';
    }

    public function sendMessage($data)
    {
        return $this->curlExecute('sendMessage', $data);
    }

    public function sendHtmlMessage($text, $chat_id)
    {

        $data = array("chat_id" => $chat_id, "text" => $text, "parse_mode" => 'HTML');
        return $this->curlExecute('sendMessage', $data);
    }

    public function sendMarkdownMessage($text, $chat_id)
    {

        $data = array("chat_id" => $chat_id, "text" => $text, "parse_mode" => 'Markdown');
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

    public function sendWithKeyboardMessage($data)
    {
        $keyboard = [
            ['hi']
        ];
        $reply_markup = array(
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        );
        $param = array("chat_id" => $data['chat_id'], "text" => $data['text'], "reply_markup" => $reply_markup);
        return $this->curlExecute('sendMessage', $data);
    }

    public function sendWithInlineKeyboardMessage($text, $chat_id, $keyboard)
    {

        /* $reply_markup = array(
             'keyboard' => $keyboard,
             'resize_keyboard' => true,
             'one_time_keyboard' => true
         );*/
        $data = array("chat_id" => $chat_id, "text" => $text, "reply_markup" => $keyboard);
        return $this->curlExecute('sendMessage', $data);
    }

    public function sendPhotoByUrl($caption = "", $url, $chat_id)
    {
        $data = array("chat_id" => $chat_id, "photo" => $url, "caption" => $caption);
        return $this->curlExecute('sendPhoto', $data);
    }

    public function sendVideoByUrl($caption = "", $url, $chat_id)
    {

        $data = array("chat_id" => $chat_id, "video" => $url, "caption" => $caption);
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