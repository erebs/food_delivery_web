<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grocery_category extends Model
{
    use HasFactory;
    protected $table='grocery_categories';
    protected $guarded=[];
}
