<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $fillable = ['id','longitude','latitude','crop_id','user_id','size','price','image','region_id','quantity','currency','district_id','visible'];

    public function crop(){
        return $this->belongsTo(Crop::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
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

    public function farmCrops(){
        return $this->hasMany(FarmCrop::class);
    }
}
