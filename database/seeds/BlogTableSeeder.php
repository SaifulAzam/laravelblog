<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Blog;
use Faker\Factory;

class BlogTableSeeder extends Seeder {

	public function run()
	{
		$faker = Factory::create();
		Blog::truncate();
 		foreach(range(1,100) as $index)
		{
			Blog::create([
 			'title' => $faker->sentence(2),
 			'excerpt' => $faker->sentence(3),
 			'content' => $faker->sentence(20),
 			'published_at' => $faker->dateTime(),
 			'user_id' => 2
 			]);
 		}
 	}	
}