<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{

    public function testExample()
    {
        $response = $this->get('/');
        $response->assertOk();
    }

    public function testAuthorize(){
        $this->get("/login",[
            "email"=> 'andrew@gmail.com',
            "password"=> 'pass' 
        ]);
        $response = $this->get("admin/");
        $response->assertStatus(302);
    }
    public function testRegister(){
        $this->get("/register",[
            "email"=> 'andrew@gmail.com',
            "password"=> 'pass' 
        ]);
        $response = $this->get("admin/");
        $response->assertStatus(302);
    }

    public function testDatabase(){
        $this->assertDatabaseHas('conditions', [
                'period' => '2022-11-11',
                'percent' => 10,
                'name' => "Быстрый",
                'requirement_id' =>1
        ]);
    }
}