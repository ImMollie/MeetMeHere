<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Poke;
use App\Models\User;
use App\Models\Announcement;
use Database\Seeders\PokeStatusSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PokeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_poke_screen_can_be_rendered_if_user_is_logged()
    {
        $user = User::factory()->create();
        $announcement = Announcement::where('description','Opis testowy')->first();        
        $user_poked = User::where('id',$announcement->user_id)->first();

        $response = $this->actingAs($user)->get('chat/'.$user_poked->id);
        $this->assertAuthenticated();
        $response->assertStatus(200);
    }

    public function test_poke_screen_can_be_rendered_if_user_is_not_logged()
    {        
        $response = $this->get('/search_announcement');
        $this->assertGuest();
        $response->assertStatus(302);
    }

    public function test_has_poke_arrived()
    {        
        $this->seed(PokeStatusSeeder::class);
        $announcement = Announcement::where('description','Opis testowy')->first();        
        $user_poked = User::where('id',$announcement->user_id)->first();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('private-messagepoke/'.$user_poked->id ,[            
            'message' => 'Treść testowa'
        ]);        
        $this->assertAuthenticated();
        $this->assertTrue(Poke::where('content','Treść testowa')->exists());
        $response->assertStatus(200);
    }
}
