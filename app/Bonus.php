<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    public function staff(){
        return $this->hasMany(Staff::class);
    }
}
