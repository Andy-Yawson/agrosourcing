<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseCrop extends Model
{
    protected $fillable = ['visible','crop_variety','moisture_content','available_start','available_end','available_end',
        'total_stock_available','total_stock_available_unit','minimum_order_quantity','minimum_order_quantity_unit','delivery_cost_description',
        'organic','quantity','package_quantity','price','currency','crop_id','warehouse_id'];
    //
    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }

    public function crop(){
        return $this->belongsTo(Crop::class);
    }
}
