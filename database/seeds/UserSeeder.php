<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Edionme Larosa',
            'email' => 'edionme@card.com',
            'password' => Hash::make('admin'),
        ]);

        factory(User::class, 5)->create();
    }
}
