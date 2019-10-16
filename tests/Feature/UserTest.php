<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function Test_register_user()
    {
        $authData = [
			'name' => 'teste',
			'email'=>'teste@gmail.com', 
			'password' => '123123', 
			'password_confirmation'=> '123123'
			];
			
		$this->json('POST', '/api/register', $authData)
			->AssertStatus(201)
			->assertJsonStructure([
				'user'=>['name', 'email', 'update_at','create_at', 'id' ],
				'token'
			]);
			
    }
}
