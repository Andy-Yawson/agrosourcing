<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = "shippings";

    protected $fillable = ['name','user_id','company','address','city','ghana_post','phone'];
}
