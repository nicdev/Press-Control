<?php 

use Faker\Factory as Faker;

class SitesTableSeeder extends Seeder {
	
	public function run()
	{

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{

			Site::create([

				'filepath' => '/path/to/file.txt',
				'title' => $faker->sentence(2),
				'url'	=> $faker->url(),

			]);
		}
	}
}