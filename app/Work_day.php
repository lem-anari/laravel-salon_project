<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work_day extends Model
{
    public function schedule(){
        return $this->hasMany(Schedule::class);
    }
}
