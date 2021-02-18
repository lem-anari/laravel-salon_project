<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function pos_service(){
        return $this->hasMany(Pos_service::class);
    }

    public function registration(){
        return $this->hasMany(Registration::class);
    }
}
