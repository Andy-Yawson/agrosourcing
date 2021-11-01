<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['region_id','latitude','longitude','price','user_id','image','quantity','currency','district_id','name'];

    public function crops(){
        return $this->belongsToMany(Crop::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function admins(){
        return $this->belongsToMany(Admin::class);
    }

    public function district(){
        return $this->belongsTo(District::class, 'district_id', 'id', 'districts');
    }
}
