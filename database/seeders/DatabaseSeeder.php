<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Listing;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
	// \App\Models\User::factory(5)->create();
	$user = User::factory()->create([
	    'name' => 'John Doe',
	    'email'=> 'john@gmail.com'
	]);
	Listing::factory(6)->create([
	    'user_id' => $user->id
	]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
	/* Listing::create([
	    "title" => "Laravel Senior Developer",
	    "tags" => "laravel, javascript",
	    "company"=> "Acme Corp",
	    "location"=> "Boston, MA",
	    "email"=> "email@gmail.com",
	    "website"=> "https://www.acme.com",
	    "description"=>"Pretty good mf"
	 ]);
	 Listing::create([
	    'title' => "Laravel Junior Developer",
	    'tags' => "laravel, javascript",
	    'company'=> "Acme Corp",
	    'location'=> "Boston, MA",
	    'email'=> "email@gmail.com",
	    "website"=> "https://www.acme.com",
	    "description"=>"Pretty good junior mf"
	 ]);
	 */
    }
}
