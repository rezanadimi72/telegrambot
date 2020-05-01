<?php
namespace rezanadimi\telegram\types;


/**
 * @author Reza Nadimi JR <rezanadimi88@gmail.com>
 * This object represents a custom keyboard with reply options (see Introduction to bots for details and examples).
 */
class ReplyKeyboardMarkup
{
    public $keyboard;

    public $resize_keyboard;

    public $one_time_keyboard;

    public $selective;
}