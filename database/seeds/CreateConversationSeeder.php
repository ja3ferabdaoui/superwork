<?php
  
use Illuminate\Database\Seeder;
use App\Conversation;

class CreateConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conversation::create([
            'user_id' => 2,
            'subject' => 'Test subject',
            'text' => 'Test Description',
            'status' => 0,
        ]);  
        Conversation::create([
            'user_id' => 2,
            'subject' => 'Test subject',
            'text' => 'Test Description',
            'status' => 1,
        ]); 
        Conversation::create([
            'user_id' => 2,
            'subject' => 'Test subject',
            'text' => 'Test Description',
            'status' => 1,
        ]); 
        Conversation::create([
            'user_id' => 2,
            'subject' => 'Test subject',
            'text' => 'Test Description',
            'status' => 1,
        ]); 
        Conversation::create([
            'user_id' => 2,
            'subject' => 'Test subject',
            'text' => 'Test Description',
            'status' => 0,
        ]); 
         
    }
}
