<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = "admins";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'level','district'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin($id){
        return $this->where('level',1)->where('id',$id)->first() ? true : false;
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function farms(){
        return $this->belongsToMany(Farm::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function warehouses(){
        return $this->belongsToMany(Warehouse::class);
    }
}
