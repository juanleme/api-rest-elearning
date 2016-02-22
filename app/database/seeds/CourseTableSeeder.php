<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CourseTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		DB::table('courses')->delete();
		
		foreach(range(1, 4) as $index)
		{
		    Course::create(array(
		        'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
		        'description' => $faker->text($maxNbChars = 200),
		        'image' => 'http://placehold.it/350x350'
		    ));
		}
	}

}