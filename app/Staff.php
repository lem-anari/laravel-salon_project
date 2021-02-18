<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function bonus(){
        return $this->belongsTo(Bonus::class);
    }

    public function fine(){
        return $this->belongsTo(Fine::class);
    }

    public function position_of_staff(){
        return $this->belongsTo(Position_of_staff::class);
    }
}
