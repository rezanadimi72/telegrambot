<?php
namespace rezanadimi\telegram\types;




/**
 * @author Reza Nadimi JR <rezanadimi88@gmail.com>
 * Upon receiving a message with this object,
 * Telegram clients will display a reply interface to the user
 * (act as if the user has selected the bot‘s message and tapped ’Reply').
 * This can be extremely useful if you want to create user-friendly step-by-step interfaces without having to sacrifice privacy mode.
 */
class ForceReply
{
    public $force_reply;

    public $selective;
}