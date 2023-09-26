<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grocery_variant extends Model
{
    use HasFactory;
    protected $table='grocery_variants';
    protected $guarded=[];

            public function GetItem()
    {
        return $this->belongsTo(grocery_item::class, 'item', 'id');
    }
}
