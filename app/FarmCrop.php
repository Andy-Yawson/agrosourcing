<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FarmCrop extends Model
{
    protected $table = "farm_crops";

    protected $fillable = ['visible'];
    //
    public function farm(){
        return $this->belongsTo(Farm::class);
    }

    public function crop(){
        return $this->belongsTo(Crop::class);
    }
}
