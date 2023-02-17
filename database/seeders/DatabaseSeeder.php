<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\UserSeed;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeed;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

		$this->call([
			UserSeed::class,
			CategorySeed::class
			]);

			 User::factory(50)->create();
			//  Author::factory(100)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
