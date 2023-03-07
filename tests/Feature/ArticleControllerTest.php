<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * Create a fake user
     * @return array
     */
    private function makeUser(): array
    {
        return [
            'username' 	=> 'helenam',
            'email'     => 'helena.morado@gmail.com',
            'password'  => '123'
        ];
    }


    /**
     * Test user registration endpoint
     *
     * @return void
     */
    public function test_user_can_registrate()
    {
        $userData = $this->makeUser();

        $response = $this->json('POST', 'api/auth/signup', $userData);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Successfully created user!'
            ]);

        $this->assertDatabaseHas('users', [
            'username' 	=> 'helenam',
            'email'     => 'helena.morado@gmail.com',
        ]);

        return $response->json()['uuid']; // El uuid con el cual se creó el usuario en BDD
    }
}
