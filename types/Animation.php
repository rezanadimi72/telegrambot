<?php
namespace rezanadimi\telegram\types;




/**
 * @author Reza Nadimi JR <rezanadimi88@gmail.com>
 * This object represents an animation file (GIF or H.264/MPEG-4 AVC video without sound).
 */
class Animation
{
    public $file_id;

    public $file_unique_id;

    public $width;

    public $height;

    public $duration;

    private $_thumb;

    public $file_name;

    public $mime_type;

    public $file_size;


    public function getThumb()
    {
        return $this->_thumb;
    }

    public function setThumb($value)
    {
        $this->_thumb = new PhotoSize($value);
    }
}