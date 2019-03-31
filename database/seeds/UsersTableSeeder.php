<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create predefined own user
        User::create([
            'name'              => 'Mark',
            'email'             => 'mbvestil@gmail.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
            'api_token'         => 'fixedseededapitoken',
        ]);

        // create fake users
        factory(App\Models\User::class, 50)->create();
    }
}
