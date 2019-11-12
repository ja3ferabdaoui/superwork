<?php
  
use Illuminate\Database\Seeder;
use App\Role;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create([
        	'id' => 1, 
            'role' => 'admin',
        ]);  
        $role1 = Role::create([
        	'id' => 2, 
            'role' => 'client',
        ]);  
    }
}