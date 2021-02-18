<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function staff(){
        return $this->belongsTo(Staff::class);
    }

    public function work_day(){
        return $this->belongsTo(Work_day::class);
    }

    public function registration(){
        return $this->hasMany(Registration::class);
    }
}
