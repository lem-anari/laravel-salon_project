<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    public function staff(){
        return $this->hasMany(Staff::class);
    }
}
