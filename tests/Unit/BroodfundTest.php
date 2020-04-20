<?php

namespace Tests\Unit;


use App\Models\Broodfund;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BroodfundTest extends TestCase {


    use RefreshDatabase;

    public function test_breadfund_has_many_users() {

        $broodfund = factory(Broodfund::class)->create();
        $users = factory(User::class, 3)->create([
            'broodfund_id' => $broodfund->id
        ]);

        $broodfundUserIds = $broodfund->users->pluck('id');

        foreach ($users as $user) {
            $this->assertContains($user->id, $broodfundUserIds);
        }

    }

    public function test_breadfund_has_many_transactions() {

        $broodfund = factory(Broodfund::class)->create();
        $transactions = factory(Transaction::class, 3)->create([

            'broodfund_id' => $broodfund->id,

        ]);

        $broodfundTransactionIds = $broodfund->transactions->pluck('id');

        foreach ($transactions as $transaction){

            $this->assertContains($transaction->id, $broodfundTransactionIds);

        }


    }
}
