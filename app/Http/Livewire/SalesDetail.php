<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Item;
use App\Models\Sale;
use App\Models\SalesDetail as ModelsSalesDetail;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class SalesDetail extends Component
{
    
    public $so_no, $active, $so_dt, $customer_id, $items_id, $qty, $sal_price, $sal_amt, $backlog;
    public $item, $items;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;
    
 
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
   
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    private function resetInputFields(){

        $this->so_no = '';
        $this->active = '';
        $this->so_dt = '';
        $this->customer_id = '';
        $this->items_id = '';
        $this->qty = '';
        $this->sal_price = '';
        $this->sal_amt = '';
    }

    public function SetSono($so_no){
        // $lastcode = DB::table('sales')
        // ->select('so_no')
        // ->WhereDate("created_at",Carbon::today())
        // ->orderBy('created_at','DESC')
        // ->first();
        $lastcode = Sale::WhereDate("created_at",Carbon::today())
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
            } $no=Str::substr($lastcode->so_no, 0,7).$jmlnol.$lastdigit;
        }else{
            $no="S".Carbon::today()->format('ymd')."0001";
        }
            // S2301240001
          return $this->so_no=$no;
    }

    public function store()
    {
        $validatedDate = $this->validate([
                'items_id.0' => 'required',
                'qty.0' => 'required',
                'item.*' => 'required',
                'qty.*' => 'required',
                'so_dt'=>'required',
                'customer_id'=>'required'
            ],
            [
                'items_id.0.required' => 'item field is required',
                'qty.0.required' => 'qty field is required',
                'items_id.*.required' => 'item field is required',
                'qty.*.required' => 'qty field is required',
                'so_dt' => 'item field is required',
                'customer_id' => 'qty field is required',
            ]
        );

  

        $lastcode = Sale::WhereDate("created_at",Carbon::today())
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
            } $no=Str::substr($lastcode->so_no, 0,7).$jmlnol.$lastdigit;
        }else{
            $no="S".Carbon::today()->format('ymd')."0001";
        }

        $inputHeader=Sale::create([
            'so_no' => $no,
            'so_dt' => $this->so_dt,
            'customer_id' => $this->customer_id,
            'sal_amt'=>0,
            'status'=>1
            
        ]);


        foreach ($this->qty as $key => $value) {
            // $idofItem= substr($this->items_id[$key],1,1);
            // $sal_price = Item::where('id',$idofItem)->first();

            ModelsSalesDetail::create([
            'items_id' => $this->items_id[$key], 
            'qty' => $this->qty[$key],
            'backlog'=>$this->qty[$key],
            'sal_price'=> 50,//$sal_price->sel_price,
            'sales_id'=>'1'
        ]);

        }
  
        $this->inputs = [];
   
        $this->resetInputFields();
   
        return redirect('/sales')->with('success','Registration Successfull!');

      
    }
    // public function mount($item)
    // {
    //     $this->item=$item;
    // }

    public function show()
    {
        return view('sales.sales',[
            'title' => 'Sales List',
            'base' => 'sale',
            'button' => 'Sales Detail',
            'sales' => Sale::orderBy('so_no')->filter(request(['search']))->paginate(10)->WithQueryString()
        ]);
    }

    public function render()
    {
        return view('livewire.sales-detail',[
            // $this->item=Item::select('id','item_cd','item_nm')->get()->toArray(),
            'item'=>Item::all(),
            'customer'=>Customer::all(),
        ]);
    }

    public function showDetail()
    {
        return view('sale',[
            'title' => 'Sales List',
            'base' => 'sales',
            'button' => 'Sales Detail'
        ]);
    }
}
