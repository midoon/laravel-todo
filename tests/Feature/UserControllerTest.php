<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
   public function testLoginPage(){
    $this->get("/login")->assertSeeText("Login");
   }

   public function testLoginSucces(){
       $this->post("/login",[
           "user" => "harun",
           "password" => "rahasia"
       ])->assertRedirect("/")
            ->assertSessionHas("user", "harun");
   }

   public function testValidationError(){
    $this->post("/login",[
        
    ])->assertSeeText("User or Password is required");
    }

    public function testLoginVailed(){
        $this->post("/login",[
            "user" => "salah",
            "password" => "salah"
        ])->assertSeeText("User or Password wrong");
    }


   
}
