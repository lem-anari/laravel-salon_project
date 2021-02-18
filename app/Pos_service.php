<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pos_service extends Model
{
    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function position_of_staff(){
        return $this->belongsTo(Position_of_staff::class);
    }
}
