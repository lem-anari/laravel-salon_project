<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function share_on_procedure(){
        return $this->belongsTo(Share_on_procedure::class);
    }

    public function registration(){
        return $this->hasMany(Registration::class);
    }
}
