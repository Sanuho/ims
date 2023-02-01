<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Customer;
use App\Models\Item;
use App\Models\SalesDetail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sales',[
            "title"=> "Sales List",
            "base"=>"sale",
            "button"=>"Sales",
            "sales" =>Sale::orderBy('so_no')->filter(request(['search']))->paginate(10)->WithQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleRequest $request)
    {

        $validatedData=$request->validate([
            'so_no'=>'max:255',
            'customer_id' => 'required',
            'so_dt'=>'max:255',
            'status'=>'required'
        ]);

        $lastcode = DB::table('sales')
        ->select('so_no')
        // ->where('so_no', 'like', $validatedData['customer_id'].'%')
        ->WhereDate("created_at",Carbon::today())
        ->orderBy('created_at','DESC')
        ->first();

        if ($lastcode<>"") {
            $subdigit=Str::substr($lastcode->so_no, 7);
            $lastdigit=intval($subdigit)+1;
            $code=strlen(Str::substr($lastcode->so_no, 0,7).($lastdigit+1));
            if($code==8){
                $jmlnol="000";
            }elseif($code=9){
                $jmlnol="00";
            }elseif($code=10){
                $jmlnol="0";
            }elseif($code=11){
                $jmlnol="";
            } $so_no=Str::substr($lastcode->so_no, 0,7).$jmlnol.$lastdigit;
        }else{
            $so_no="S".Carbon::today()->format('ymd')."0001";
        }
            // S2301240001
            $validatedData['so_no']=$so_no;
        


        Sale::create($validatedData);


        $request->validate([
            'addMoreInputFields.*.item_id' => 'required',
            'addMoreInputFields.*.qty' => 'required|numeric',
            'sales_id'=>'',
            'sal_price'=>'',
            'backlog'=>'addMoreInputFields.*.qty',
        ]);


        foreach ($request->addMoreInputFields as $key => $value) {
            // $value['sal_price']=Item::where('item_cd',$value['item_cd'])->sel_price;
            $value['sales_id']=$so_no;
            SalesDetail::create($value);
        }
        return redirect('/sales')->with('success','Registration Successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return view('sale',[
            "title"=> "Sales Order Entry",
            "base"=>"sale",
            "button"=>"Sales",
            "customer" => Customer::all(),
            "item" => Item::all(),
        ]);

        // $lastcode = DB::table('sales')
        // ->select('so_no')
        // ->WhereDate("created_at",Carbon::today())
        // ->orderBy('customer_id','DESC')
        // ->first();
        // $so_no="S".Carbon::today()->format('ymd')."0001";
        // dd($so_no);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaleRequest  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    
}
