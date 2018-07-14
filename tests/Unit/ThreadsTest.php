<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class ThreadsTest
 * @package Tests\Unit
 * vendor/bin/phpunit
 */
class ThreadsTest extends TestCase
{

    use DatabaseMigrations;

    protected $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();

    }

    /** @test */
    public function a_user_can_browse_threads()
    {

       $title = $this->thread->title;

       $response = $this->get('/threads');

       $response->assertStatus(200);

       // echo $thread->title;

       $response->assertSee($title);


    }


    /** @test */
    public function a_user_can_browse_single_thread() {

        // single thread
        $response = $this->get('/threads/' . $this->thread->id);

        $response->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_replies_that_are_associated_with_a_thread() {

        $reply = factory('App\Reply')->create([ 'thread_id' => $this->thread->id ]);

        $this->get('/threads/' . $this->thread->id)->assertSee($reply->body);

    }


    /** @test */
    public function a_thread_has_a_creator() {

        $creator = $this->thread->creator;

        $this->assertInstanceOf('App\User', $creator);

    }

    /** @test */
    public function a_thread_can_add_a_reply() {

        $this->thread->addReply([
            'body' => 'Foobar',
            'user_id' => 1
        ]);

        $this->assertCount(1, $this->thread->replies);

    }


}
