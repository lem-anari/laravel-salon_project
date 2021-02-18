<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }
}
