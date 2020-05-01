<?php
namespace rezanadimi\telegram\types;



/**
 * @author Reza Nadimi JR <rezanadimi88@gmail.com>
 * This object represents a file ready to be downloaded. 
 * The file can be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>.
 * It is guaranteed that the link will be valid for at least 1 hour. When the link expires, 
 * a new one can be requested by calling getFile.
 * Maximum file size to download is 20 MB
 */
class File
{
    public $file_id;

    public $file_unique_id;

    public $file_size;

    public $file_path;
}