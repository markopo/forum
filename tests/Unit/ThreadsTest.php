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

    /** @test */
    public function a_user_can_browse_threads()
    {
       $thread = factory('App\Thread')->create();
       $title = $thread->title;

       $response = $this->get('/threads');

       $response->assertStatus(200);

       // echo $thread->title;

       $response->assertSee($title);


    }


    /** @test */
    public function a_user_can_browse_single_thread() {

        $thread = factory('App\Thread')->create();
        // single thread
        $response = $this->get('/threads/' . $thread->id);

        $response->assertSee($thread->title);
    }
}
