<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position_of_staff extends Model
{
    public function staff(){
        return $this->hasMany(Staff::class);
    }
}
