<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','price','materials',
        'business','region_id','longitude','latitude','wastes','user_id','image','quantity','currency','district_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function admins(){
        return $this->belongsToMany(Admin::class);
    }

    public function processingProducts(){
        return $this->hasMany(ProcessingProduct::class);
    }
}
