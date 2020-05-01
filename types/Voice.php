<?php
namespace rezanadimi\telegram\types;



/**
 * @author Reza Nadimi JR <rezanadimi88@gmail.com>
 * This object represents a voice note.
 */
class Voice
{
    public $file_id;

    public $file_unique_id;

    public $duration;

    public $mime_type;

    public $file_size;
}