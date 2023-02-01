<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory;

    // protected $fillable=['item_cd','item_nm','cust_pn','category_id','unit_cd','pck_unit_cd','com_cd','loc_cd','buy_price','sel_price','active_flg'];
    protected $guarded=['id'];
    protected $with=['category','customer','unit'];
    

public function scopeFilter($query, array $filters){
    
    // if (isset($filters['search']) ? $filters['search'] : false ) {
    //      return  $query->where('item_cd','like','%'.$filters['search'].'%')
    //                    ->orWhere('item_nm','like','%'.$filters['search'].'%');
    // }

    $query->when($filters['search']?? false , function($query,$search){
        return  $query->where('item_cd','like','%'.$search.'%')
                      ->orWhere('item_nm','like','%'.$search.'%');
    });

}

public function validate($query,$itm_cd)
    {
        $query = DB::table('items')
            ->select('item_cd')
            ->where('item_cd', 'like', $itm_cd.'%')
            ->orderBy('item_cd','DESC')
            ->first();
        return $query;
    }

public function getRouteKeyName()
{
    return 'item_cd';
}
   

public function category(){
    return $this->belongsTo(Category::class);
}

public function customer(){
    return $this->belongsTo(Customer::class,'customer_id');
}
 
public function unit(){
    return $this->belongsTo(Unit::class,'unit_id');
}
public function location(){
    return $this->belongsTo(location::class,'location_id');
}

public function salesDetail(){
    return $this->hasMany(SalesDetail::class);
}



}