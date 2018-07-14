<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipationInForumTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {

        // 1. user create && signin
        $user = factory('App\User')->create();
        $this->signIn($user);

        // 2. thread
        $thread = factory('App\Thread')->create();

        // 3. reply
        $reply = factory('App\Reply')->make();

        // 4. submit
        $this->post('/threads/' . $thread->id . '/replies', $reply->toArray());

        // 5. visit
        $this->get($thread->path())
             ->assertSee($reply->body);

    }

}
