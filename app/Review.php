<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id','comment','product_id','type'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
