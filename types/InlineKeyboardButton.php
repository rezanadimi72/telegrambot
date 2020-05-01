<?php
namespace rezanadimi\telegram\types;




/**
 * @author Reza Nadimi JR <rezanadimi88@gmail.com>
 * This object represents one button of an inline keyboard. You must use exactly one of the optional fields.
 */
class InlineKeyboardButton
{
    public $text;

    public $url;

    public $login_url;

    public $callback_data;

    public $switch_inline_query;

    public $switch_inline_query_current_chat;

    public $callback_game;

    public $pay;
}