<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class BroodfundUserController extends Controller {
    public function create(CreateUserRequest $request) {
        $admin = $request->user();
        $user = new User;
        $user->broodfund_id = $admin->broodfund_id;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = '';
        $user->is_admin = $request->get('is_admin');
        $user->save();


    }
}
