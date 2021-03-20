<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessingProduct extends Model
{
    //
    protected $fillable = ['visible'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
