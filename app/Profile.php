<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['pic','bio','company','user_id','dob','card_no','gender'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
