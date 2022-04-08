<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "username" => "admin",
            "name" => "Site Admin",
            "email" => "admin@larashop.test",
            "roles" => json_encode(["ADMIN"]),
            "password" => Hash::make("admin"),
            "avatar" => "unknown.png",
            "address" => "Wirun, Mojolaban, Sukoharjo"
        ]);

        $this->command->info("Success insert user admin!");
    }
}
