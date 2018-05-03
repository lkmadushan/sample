<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function it_can_paginate_users()
    {
        factory('App\User', 5)->create();

        config(['medi.page_count' => 2]);

        $response = $this->get('api/v1/users');
        $response->assertStatus(200);
        $response->assertJsonCount(2, 'data');
    }

    /** @test */
    public function it_can_retrieve_a_user()
    {
        $users = factory('App\User', 3)->create();

        $response = $this->get('api/v1/users/'.$users->first()->id);
        $response->assertStatus(200);
        $response->assertJson($users->first()->toArray());

        $response = $this->get('api/v1/users/'.$users->last()->id);
        $response->assertStatus(200);
        $response->assertJson($users->last()->toArray());
    }

    /** @test */
    public function it_can_create_a_user()
    {
        $response = $this->post('api/v1/users', [
            'name' => 'Jhon Doe',
            'email' => 'jhon@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret'
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'name' => 'Jhon Doe',
            'email' => 'jhon@example.com'
        ]);
    }

    /** @test */
    public function it_can_update_a_user()
    {
        $users = factory('App\User', 2)->create();

        tap($users->first(), function ($user) {
            $this->put('api/v1/users/'.$user->id, [
                'name' => 'Foo bar',
                'email' => 'foo@bar.com'
            ])->assertStatus(204);

            $this->assertEquals($user->fresh()->email, 'foo@bar.com');
        });
    }
}
