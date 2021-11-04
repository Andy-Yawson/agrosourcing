<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalInfo extends Model
{
    public function animal(){
        return $this->belongsTo(Animal::class);
    }
}
