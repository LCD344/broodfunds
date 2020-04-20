<?php

namespace Tests\Feature\BroodfundAdmin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase {
    use RefreshDatabase;

    public function test_admin_can_create_member() {

        $admin = factory(User::class)->create([

            'is_admin' => true
        ]);

        $response = $this->actingAs($admin)->post('/broodfund/users', [
            'name' => 'Alicia',
            'email' => 'alicia@schatjemail.com',
            'is_admin' => false
        ]);

        $response->assertSuccessful();

        $this->assertDatabaseHas('users', [
            'broodfund_id' => $admin->broodfund->id,
            'name' => 'Alicia',
            'email' => 'alicia@schatjemail.com',
            'is_admin' => 0

        ]);
    }

    public function test_member_cannot_create_member() {

        $member = factory(User::class)->create();

        $response = $this->actingAs($member)->post('/broodfund/users', [
            'name' => 'Alicia',
            'email' => 'alicia@schatjemail.com',
            'is_admin' => false
        ]);

        $response->assertForbidden();
    }
}
