<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FarmCrop extends Model
{
    protected $table = "farm_crops";

    protected $fillable = ['visible','crop_variety','moisture_content','available_start','available_end','available_end',
        'total_stock_available','total_stock_available_unit','minimum_order_quantity','minimum_order_quantity_unit','delivery_cost_description',
        'organic','image','quantity','package_quantity','price','currency','crop_id','farm_id'];
    //
    public function farm(){
        return $this->belongsTo(Farm::class);
    }

    public function crop(){
        return $this->belongsTo(Crop::class);
    }
}
