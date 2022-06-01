<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => '初期ユーザー',
            'mail' => 'Atlas@sns.com',
            'password' => 'password',
            'bio' => '自己紹介',
        ]);
    }
}
