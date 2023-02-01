<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function items(){
        return $this->hasMany(Item::class);
    }

    
    public function sale(){
            return $this->belongsTo(Sale::class);
    }
        
    
}
