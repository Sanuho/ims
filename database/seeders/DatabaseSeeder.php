<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Item;
use App\Models\Category;
use App\Models\Customer;
use App\Models\location;
use App\Models\Unit;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // Item::create([
        //     'item_cd'=>'ITM-0001',
        //     'item_nm'=>'Laptop Dell',
        //     'cust_pn'=>'D001-01',
        //     'category_id'=>'1',
        //     'unit_cd'=>'1',
        //     'pck_unit_cd'=>'1',
        //     'com_cd'=>'1',
        //     'loc_cd'=>'1',
        //     'buy_price'=>10000000,
        //     'sel_price'=>11000000,
        //     'active_flg'=>1]);

        //     Item::create([
        //     'item_cd'=>'ITM-0002',
        //     'item_nm'=>'Laptop HP',
        //     'cust_pn'=>'H001-01',
        //     'category_id'=>'2',
        //     'unit_cd'=>'1',
        //     'pck_unit_cd'=>'1',
        //     'com_cd'=>'1',
        //     'loc_cd'=>'1',
        //     'buy_price'=>10000000,
        //     'sel_price'=>11000000,
        //     'active_flg'=>1]);

        //     Item::create([
        //     'item_cd'=>'ITM-0003',
        //     'item_nm'=>'Laptop Asus',
        //     'cust_pn'=>'A001-01',
        //     'category_id'=>'3',
        //     'unit_cd'=>'1',
        //     'pck_unit_cd'=>'1',
        //     'com_cd'=>'1',
        //     'loc_cd'=>'1',
        //     'buy_price'=>10000000,
        //     'sel_price'=>11000000,
        //     'active_flg'=>1]);
        
        Customer::create([
        'cust_cd'=>'C00001',
        'cust_nm'=>'PT. TENMA INDONESIA',
        'address'=>'KAWASAN SURYACIPTA',
        'pic'=>'TORIQ',
        'phone'=>'081200001',
        'email'=>'muhammad.toriq@tenmacorp.co.jp',
        'active_flg'=>'1',
        'slug'=>'tenma',
        ]);

        Category::create([
        'cate_nm'=>'Finish Good',
        'journal'=>'1',  
        'slug'=>'finish-good',]);

        Category::create([
        'cate_nm'=>'Work In-Process', 
        'journal'=>'2',   
        'slug'=>'wip',]);

        Category::create([
        'cate_nm'=>'Material',  
        'journal'=>'3',  
        'slug'=>'material',]);

        Category::create([
        'cate_nm'=>'Component',  
        'journal'=>'4',  
        'slug'=>'componenet',]);

        Category::create([
        'cate_nm'=>'Packing',  
        'journal'=>'5',  
        'slug'=>'packing',]);

        Category::create([
        'cate_nm'=>'Sub Material',  
        'journal'=>'6',  
        'slug'=>'sub-material',]);

        Category::create([
        'cate_nm'=>'Expenses',  
        'journal'=>'8',  
        'slug'=>'expense',]);
    
        Unit::create([
        'unit_nm'=>'PCS']);  
        Unit::create([
        'unit_nm'=>'PCK']);
        Unit::create([
        'unit_nm'=>'BOX']); 
   
        location::create([
        'loc_nm'=>'WFG']);  
        location::create([
        'loc_nm'=>'WIP']);
        location::create([
        'loc_nm'=>'WM']); 

        Item::factory(50)->create();
    }
}
