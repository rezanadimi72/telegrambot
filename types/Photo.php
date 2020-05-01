<?php
namespace rezanadimi\telegram\types;




/**
 * 
 */
class Photo
{
    public $photoSize = [];

    public function __construct($config)
    {
        foreach($config as $attribute)
        {
            $this->photoSize[] = new PhotoSize($attribute);
        }
    }

}