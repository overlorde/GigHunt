<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Listing;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(5)->create();
	 Listing::factory(6)->create();
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
