<?php
namespace rezanadimi\telegram\types;




/**
 * @author Reza Nadimi JR <rezanadimi88@gmail.com>
 * Represents a video to be sent.
 */
class InputMediaVideo
{
    public $type;

    public $media;
    
    public $thumb;

    public $caption;

    public $parse_mode;

    public $width;

    public $height;

    public $duration;

    public $supports_streaming;
}