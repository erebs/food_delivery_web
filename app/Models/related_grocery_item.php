<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class related_grocery_item extends Model
{
    use HasFactory;
    protected $table='related_grocery_items';
    protected $guarded=[];

            public function GetItem()
    {
        return $this->belongsTo(grocery_item::class, 'related_item', 'id');
    }
}
