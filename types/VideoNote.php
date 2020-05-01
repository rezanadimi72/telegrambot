<?php
namespace rezanadimi\telegram\types;




/**
 * @author Reza Nadimi JR <rezanadimi88@gmail.com>
 * This object represents a video message (available in Telegram apps as of v.4.0).
 */
class VideoNote
{
    public $file_id;

    public $file_unique_id;

    public $length;

    public $duration;

    public $thumb;

    public $file_size;
}