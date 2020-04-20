<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BroodFundPageTest extends TestCase {

    use RefreshDatabase;


    public function test_member_can_see_broodFund_page() {

        $member = factory(User::class)->create();

        $response = $this->actingAs($member)->get('/broodfund');

        $response->assertSuccessful();
        $response->assertViewHas([
            'broodfund',
            'user',
            'transactions'

        ]);
        $response->assertViewIs('broodfund.home');
    }

    public function test_admin_can_see_broodFund_page() {

        $admin = factory(User::class)->create([
            'is_admin' => true,
        ]);

        $response = $this->actingAs($admin)->get('/broodfund');
        $response->assertSuccessful();
    }


    public function test_guest_cannot_see_broodFund_page() {

        $response = $this->get('/broodfund');
        $response->assertRedirect('/login');

    }
}
