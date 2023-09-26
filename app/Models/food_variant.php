<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class food_variant extends Model
{
    use HasFactory;
    protected $table='food_variants';
    protected $guarded=[];

        public function GetItem()
    {
        return $this->belongsTo(restaurent_item::class, 'item', 'id');
    }
}
