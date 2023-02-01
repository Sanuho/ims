<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\location;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index(){

        return view('items',[
            "title"=> "Item Master",
            "base"=>"item",
            "button"=>"Item",
            "items" =>Item::orderBy('item_cd')->filter(request(['search']))->paginate(10)->WithQueryString()
        ]);
    }

    public function show(Item $item){
        return view('item',[
            "title"=> "Item Master Entry",
            "item"=> $item,
            "categories" =>Category::all(),
            "customer" =>Customer::all(),
            "unit" =>Unit::all(),
            "location"=>location::all()
        ]);

        // $lastcode = DB::table('items')
        // ->select('item_cd')
        // ->where('item_cd', 'like', "1101".'%')
        // ->orderBy('item_cd','DESC')
        // ->first();

        // $firstcode = DB::table('categories')
        // ->select('journal')
        // ->where('id', 'like', Str::substr("1101",1).'%')
        // ->orderBy('id','DESC')
        // ->first();

        // dd($firstcode->journal);

    }


    public function store(Request $request)
    {
        $validatedData= $request->validate([
            'item_cd' => 'required|unique:items|max:255',
            'item_nm'=> ['required','min:4','max:255'],
            'cust_pn'=> 'max:255',
            'category_id'=> 'required|numeric',
            'unit_id'=> 'required|numeric',
            'pck_unit_cd'=> 'required|numeric',
            'customer_id'=> 'required|numeric',
            'location_id'=> 'numeric',
            'buy_price'=> 'numeric',
            'sel_price'=> 'numeric',
            'active_flg'=> 'required',
        ]);
            // $validatedData['password']=bcrypt($validatedData['password']);
            
            // $validatedData['item_cd']=$validatedData['item_cd']+(Item::last('id')+1);



            $lastcode = DB::table('items')
            ->select('item_cd')
            ->where('item_cd', 'like', $validatedData['item_cd'].'%')
            ->orderBy('item_cd','DESC')
            ->first();

            $firstcode = DB::table('categories')
            ->select('journal')
            ->where('id', 'like', Str::substr($validatedData['item_cd'],0,1).'%')
            ->orderBy('id','DESC')
            ->first();
            $company=Str::substr($validatedData['item_cd'],1);
            $jour=$firstcode->journal.$company;
            

            if ($lastcode<>"") {
                $subdigit=Str::substr($lastcode->item_cd, 5, 9);
            $lastdigit=intval($subdigit);
                $code=strlen($validatedData['item_cd'].($lastdigit+1));
                if($code==5){
                    $jmlnol="0000";
                }elseif($code=6){
                    $jmlnol="000";
                }elseif($code=7){
                    $jmlnol="00";
                }elseif($code=8){
                    $jmlnol="0";
                }elseif($code=9){
                    $jmlnol="";
                }


                $itemcode=$jour.$jmlnol.($lastdigit+1);
            }else{
                $itemcode=$validatedData['item_cd']."00001";
            }

            $validatedData['item_cd']=$itemcode;
           
            Item::create($validatedData);
            // session()->flash('success','Registration Successfull! Please login');
            return redirect('/items')->with('success','Registration Successfull!');
        
    
    }

}
