<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share_on_procedure extends Model
{
    public function client(){
        return $this->hasMany(Client::class);
    }
}
