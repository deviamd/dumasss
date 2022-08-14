<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new\App\Models\User;
        $user->name = "momon";
        $user->nik = "7281227864708421";
        $user->email = "momo2@gmail.com";
        $user->level = "ADMIN";
        $user->hp = "083283683100";
        $user->password = "65432211";
        $user->save();
        $this->command->info("Admin ditambahkan");

    }
}
