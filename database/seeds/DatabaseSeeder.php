<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement('SET foreign_key_checks = 0');

        factory('App\User')->create(
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123456'),
                'remember_token' => str_random(10),
            ]
        );

        $this->call('PostsTableSeeder');
        $this->call('TagTableSeeder');

        DB::statement('SET foreign_key_checks = 1');
        Model::reguard();
    }
}
