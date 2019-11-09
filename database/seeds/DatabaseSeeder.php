<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // $this->call(CreateRoleSeeder::class);
       // $this->call(CreateAdminUserSeeder::class);
       // $this->call(CreateClientUserSeeder::class);
        $this->call(CreateConversationSeeder::class);

        
    }
}
