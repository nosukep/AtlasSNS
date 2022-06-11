<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'username' => '初期ユーザー(1)',
            'mail' => 'Atlas@sns.com',
            'password' => Hash::make('user01'),
            'bio' => '自己紹介文が入ります。',
        ]);
    }
}
