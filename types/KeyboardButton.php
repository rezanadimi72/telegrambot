<?php
namespace rezanadimi\telegram\types;




/**
 * @author Reza Nadimi JR <rezanadimi88@gmail.com>
 * This object represents one button of the reply keyboard. 
 * For simple text buttons String can be used instead of this object to specify text of the button.
 * Optional fields request_contact, request_location, and request_poll are mutually exclusive.
 */
class KeyboardButton
{
    public $text;

    public $request_contact;

    public $request_location;

    public $request_poll;
}