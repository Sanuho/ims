<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function items(){
        return $this->hasMany(Item::class);
    }
    public function sale(){
        return $this->hasMany(Sale::class);
    }

    
}
