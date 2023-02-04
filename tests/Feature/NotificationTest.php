<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Message;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotificationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_has_notification_exist()
    {                        
        $user_a = User::factory()->create();
        $user_b = User::factory()->create();
        $message = Message::create([
            'user_id' => $user_a->id,
            'message' => 'Wiadomość testowa',
            'receiver_id' => $user_b->id
        ]);
        if($message->created_at == $message->updated_at){
            $val = true;
        }else $val = false;

        $this->assertTrue($val);
        $this->assertTrue(Message::where('message','Wiadomość testowa')->exists());
    }
}
