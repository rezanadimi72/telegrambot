<?php
namespace rezanadimi\telegram\types;




/**
 * @author Reza Nadimi JR <rezanadimi88@gmail.com>
 * Represents an audio file to be treated as music to be sent.
 */
class InputMediaAudio
{
    public $type;

    public $media;

    public $thumb;

    public $caption;

    public $parse_mode;

    public $duration;

    public $performer;

    public $title;
}