<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Poke;
use App\Models\User;
use App\Models\Announcement;
use Database\Seeders\PokeStatusSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Database\Seeders\AnnouncementStatusSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnnouncementTest extends TestCase
{
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_announcement_screen_can_be_rendered_if_user_is_logged()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/search_announcement');
        $this->assertAuthenticated();
        $response->assertStatus(200);
    }

    public function test_announcement_screen_can_be_rendered_if_user_is_not_logged()
    {        
        $response = $this->get('/search_announcement');
        $this->assertGuest();
        $response->assertStatus(302);
    }

    public function test_announcement_can_be_added()
    {     
        $this->seed(AnnouncementStatusSeeder::class);   
        $user = User::factory()->create();
        $categoryCheck = array(
            0 => 1,
            1 => 2
        ); 
        
        $response = $this->actingAs($user)->post('/store',[
            'status_id' => 2,
            'categoryCheck' => $categoryCheck,
            'description' => 'Opis testowy',            
            'place' => 'Skalmierzyce',            
            'amountPeople' => 1,
            'date' => '2023-01-27',
            'date2' => '2023-01-29'            
        ]);
        $this->assertAuthenticated();
        $this->assertTrue(Announcement::where('description','Opis testowy')->exists());
        $response->assertRedirect('/searchAnnouncement');
    }

    
}