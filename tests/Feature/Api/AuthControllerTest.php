<?php

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Support\Facades\Hash;

it('registers a user and returns a bearer token', function () {
    $this->seed(RolesAndPermissionsSeeder::class);

    $response = $this->postJson('/api/register', [
        'name' => 'API User',
        'email' => 'api-user@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'device_name' => 'Test device',
    ]);

    $response->assertCreated()
        ->assertJsonPath('message', 'Registration successful.')
        ->assertJsonPath('data.token_type', 'Bearer')
        ->assertJsonPath('data.user.email', 'api-user@example.com');

    $user = User::where('email', 'api-user@example.com')->firstOrFail();

    expect(Hash::check('Password123!', $user->password))->toBeTrue()
        ->and($user->tokens)->toHaveCount(1)
        ->and($user->hasRole('user'))->toBeTrue();
});

it('logs in and issues a token', function () {
    $user = User::factory()->create([
        'email' => 'api-user@example.com',
        'password' => 'Password123!',
    ]);

    $this->postJson('/api/login', [
        'email' => $user->email,
        'password' => 'Password123!',
        'device_name' => 'Test device',
    ])
        ->assertOk()
        ->assertJsonPath('message', 'Login successful.')
        ->assertJsonPath('data.token_type', 'Bearer')
        ->assertJsonPath('data.user.id', $user->id);

    expect($user->tokens()->count())->toBe(1);
});

it('rejects invalid login credentials', function () {
    $user = User::factory()->create(['password' => 'Password123!']);

    $this->postJson('/api/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ])
        ->assertUnauthorized()
        ->assertJsonPath('message', 'The provided credentials are incorrect.');
});

it('revokes only the token used to log out', function () {
    $user = User::factory()->create();
    $currentToken = $user->createToken('current-device');
    $otherToken = $user->createToken('other-device');

    $this->withToken($currentToken->plainTextToken)
        ->postJson('/api/logout')
        ->assertOk()
        ->assertJsonPath('message', 'Logout successful.');

    expect($user->tokens()->count())->toBe(1)
        ->and($user->tokens()->first()->name)->toBe('other-device');

    $this->app['auth']->forgetGuards();

    $this->withToken($otherToken->plainTextToken)
        ->postJson('/api/logout')
        ->assertOk();

    expect($user->tokens()->count())->toBe(0);
});

it('requires authentication to log out', function () {
    $this->postJson('/api/logout')->assertUnauthorized();
});
