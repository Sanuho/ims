<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    
    protected $guarded=['id'];
    protected $with=['customer'];


    public function scopeFilter($query, array $filters){
    
        // if (isset($filters['search']) ? $filters['search'] : false ) {
        //      return  $query->where('item_cd','like','%'.$filters['search'].'%')
        //                    ->orWhere('item_nm','like','%'.$filters['search'].'%');
        // }
    
        $query->when($filters['search']?? false , function($query,$search){
            return  $query->where('s_no','like','%'.$search.'%')
                          ->orWhere('customer_id','like','%'.$search.'%');
        });
    
    }
    
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
    
    public function salesDetail(){
        return $this->hasMany(SalesDetail::class);      
    }

}
