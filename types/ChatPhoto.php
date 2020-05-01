<?php
namespace rezanadimi\telegram\types;


use yii\base\Component;

/**
 * @author Reza Nadimi JR <rezanadimi88@gmail.com>
 * This object represents a chat photo.
 */
class ChatPhoto extends Component
{
    public $small_file_id;

    public $small_file_unique_id;

    public $big_file_id;

    public $big_file_unique_id;
}   