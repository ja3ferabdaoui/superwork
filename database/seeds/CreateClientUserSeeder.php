<?php
  
use Illuminate\Database\Seeder;
use App\User;
use App\Client;

class CreateClientUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* $user = User::create([
            'email' => 'client@gmail.com',
            'username'=>'client',
            'role_id' => 2,
            'password' => bcrypt('12345'),
            'status' => 1
        ]);  

        $client = Client::create([
            'first_name' => 'Aymen', 
            'last_name' => 'Bouein', 
            'user_id' => $user->id
        ]);  */



        $user1 = User::create([
            'email' => 'client1@gmail.com',
            'username'=>'client1',
            'role_id' => 2,
            'password' => bcrypt('12345'),
            'status' => 0
        ]);  

        $client1 = Client::create([
            'first_name' => 'Ali', 
            'last_name' => 'Ali', 
            'user_id' => $user1->id
        ]); 

        $user2 = User::create([
            'email' => 'client2@gmail.com',
            'username'=>'client2',
            'role_id' => 2,
            'password' => bcrypt('12345'),
            'status' => 1
        ]);  

        $client2 = Client::create([
            'first_name' => 'Salem', 
            'last_name' => 'Salem', 
            'user_id' => $user2->id
        ]); 
    }
}