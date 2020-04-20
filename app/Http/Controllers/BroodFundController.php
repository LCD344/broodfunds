<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BroodFundController extends Controller
{
    public function show(Request $request){
        $user = $request->user();
        $broodfund = $user->broodfund;
        $transactions = $broodfund->transactions;


        return view ('broodfund.home', compact('user', 'broodfund', 'transactions'));
    }
}
