<?php
namespace rezanadimi\telegram\types;



/**
 * @author Reza Nadimi JR <rezanadimi88@gmail.com>
 * This object represents an audio file to be treated as music by the Telegram clients.
 */
class Audio
{
    public $file_id;
    
    public $file_unique_id;

    public $duration;

    public $performer;

    public $title;

    public $mime_type;

    public $file_size;

    public $thumb;
}