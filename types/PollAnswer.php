<?php
namespace rezanadimi\telegram\types;



/**
 * @author Reza Nadimi JR <rezanadimi88@gmail.com>
 * This object represents an answer of a user in a non-anonymous poll.
 */
class PollAnswer
{
    public $poll_id;

    public $user;

    public $option_ids;
}