<?php
namespace rezanadimi\telegram\types;




/**
 * @author Reza Nadimi JR <rezanadimi88@gmail.com>
 * Represents an animation file (GIF or H.264/MPEG-4 AVC video without sound) to be sent.
 */
class InputMediaAnimation
{
    public $type;

    public $media;

    public $thumb;

    public $caption;

    public $parse_mode;

    public $width;

    public $height;

    public $duration;
}