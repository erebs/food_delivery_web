<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class related_food_item extends Model
{
    use HasFactory;
    protected $table='related_food_items';
    protected $guarded=[];

        public function GetItem()
    {
        return $this->belongsTo(restaurent_item::class, 'related_item', 'id');
    }
}
