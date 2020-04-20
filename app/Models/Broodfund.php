<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Broodfund extends Model {
    public function users() {


        return $this->hasMany(User::class);

    }

    public function transactions() {

        return $this->hasMany(Transaction::class);

    }
}
