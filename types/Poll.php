<?php
namespace rezanadimi\telegram\types;




/**
 * @author Reza Nadimi JR <rezanadimi88@gmail.com>
 * This object contains information about a poll.
 */
class Poll
{
    public $id;

    public $question;

    public $options;

    public $total_voter_count;

    public $is_closed;

    public $is_anonymous;

    public $type;

    public $allows_multiple_answers;

    public $correct_option_id;
}