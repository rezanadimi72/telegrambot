<?php
namespace rezanadimi\telegram\types;




/**
 * @author Reza Nadimi JR <rezanadimi88@gmail.com>
 * This object represents a parameter of the inline keyboard button used to automatically authorize a user.
 *  Serves as a great replacement for the Telegram Login Widget when the user is coming from Telegram.
 *  All the user needs to do is tap/click a button and confirm that they want to log in:
 */
class LoginUrl
{
    public $url;

    public $forward_text;

    public $bot_username;

    public $request_write_access;
}