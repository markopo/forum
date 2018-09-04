<?php

use Illuminate\Database\Seeder;
use App\Thread;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
	    $this->SeedThreadsAndReplies();
    }


    private function SeedThreadsAndReplies() {

		$existingThreads = Thread::all();
		$hasThreads = count($existingThreads) > 0;

		if($hasThreads) {
			return;
		}

	    $threads = factory('App\Thread', 50)->create();
	    $threads->each(function($thread) {  factory('App\Reply', 10)->create([ 'thread_id' => $thread->id ]);   });
    }
}
