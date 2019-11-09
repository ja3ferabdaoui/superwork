<?php
  
use Illuminate\Database\Seeder;
use App\User;
use App\Admin;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'admin@gmail.com',
            'username'=>'admin',
            'role_id' => 1,
            'password' => bcrypt('123456'),
            'status' => 1
        ]);  

        $admin = Admin::create([
            'first_name' => 'Aymen', 
            'last_name' => 'Bouein', 
            'user_id' => $user->id
        ]);  
    }
}