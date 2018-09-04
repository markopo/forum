<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class CreateThreads
 * @package Tests\Feature
 * @description: run test: vendor/bin/phpunit tests/Feature/CreateThreads.php
 */
class CreateThreads extends TestCase
{
    use DatabaseMigrations;


    /** @test */
    public  function  guests_may_not_create_threads() {

        $this->expectException('Illuminate\Auth\AuthenticationException');

        $thread = make('App\Thread');
        $this->post('/threads', $thread->toArray());

    }

    /** @test */
    public  function an_authenticated_user_can_create_new_forum_threads() {

        // 1. Given we have a signed in user
        $this->signIn();

        // 2. Create thread
        $thread = make('App\Thread');
        $this->post('/threads', $thread->toArray());


        // 3. See created thread
        $this->get($thread->path())
             ->assertSee($thread->title)
             ->assertSee($thread->body);

    }
}
