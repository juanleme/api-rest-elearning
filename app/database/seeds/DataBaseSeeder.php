<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('CourseTableSeeder');

        $this->command->info('User table seeded!');
    }

}
