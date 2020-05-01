<?php
namespace rezanadimi\telegram\types;



/**
 * @author Reza Nadimi JR <rezanadimi88@gmail.com>
 * Represents a general file to be sent.
 */
class InputMediaDocument
{
    public $type;

    public $media;

    public $thumb;

    public $caption;

    public $parse_mode;
}