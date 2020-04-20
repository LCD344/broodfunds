<?php

namespace Tests\Unit;

use App\Models\Broodfund;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase {
    use RefreshDatabase;

    public function test_user_belongs_to_broodfund() {

        $broodfund = factory(Broodfund::class)->create();
        $user = factory(User::class)->create([
            'broodfund_id' => $broodfund->id
        ]);


        $this->assertEquals($broodfund->id, $user->broodfund->id);

    }
}
