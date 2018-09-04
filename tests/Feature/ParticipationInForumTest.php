<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipationInForumTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {

        // 1. user create && signin
        $user = create('App\User');
        $this->signIn($user);

        // 2. thread
        $thread = create('App\Thread');

        // 3. reply
        $reply = make('App\Reply');

        // 4. submit
        $this->post('/threads/' . $thread->id . '/replies', $reply->toArray());

        // 5. visit
        $this->get($thread->path())
             ->assertSee($reply->body);

    }

}
