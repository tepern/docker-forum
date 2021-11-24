<?php

use Illuminate\Database\Seeder;
use App\Models\Topic;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'author',
                'email' => 'author1@test.ru',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Автор',
                'email' => 'author2@test.ru',
                'password' => bcrypt('123123'),
            ],
        ];

        DB::table('users')->insert($data);
    }
}
