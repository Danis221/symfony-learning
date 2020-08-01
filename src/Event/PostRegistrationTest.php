<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class PostRegistrationTest extends Event{

    public const NAME = 'post.registered';

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getPost()
    {
        return $this->post;
    }


}