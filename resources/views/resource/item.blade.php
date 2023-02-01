@extends('layouts.main')
@section('container')
<section id="item" class="pt-8 pb-32">


    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
          <div class="border-t border-gray-200"></div>
        </div>
      </div>
      
      <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Item Master Registartion</h3>
              <nav class="flex items-center pt-4">
                <ul>
                  <li class="pr-2">
                    <a href="/items" class="justify-center rounded-full border border-transparent bg-green-500 py-2 px-4 text-sm font-medium text-white shadow-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-slate-600 focus:ring-offset-2">back</a> 
                  </li>
                </ul>
                <ul>
                  <li class="px-2">
                    <a href="#" class="justify-center rounded-full border border-transparent bg-yellow-500 py-2 px-4 text-sm font-medium text-white shadow-lg hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-slate-600 focus:ring-offset-2">
                    edit
                    </a>
                  </li>
                </ul>
                <ul>
                  <li class="pl-2">
                    <a href="#" class="justify-center rounded-full border border-transparent bg-red-500 py-2 px-4 text-sm font-medium text-white shadow-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-slate-600 focus:ring-offset-2"> delete</a>
                  </li>
                </ul>  
              </nav>
              
            </div>
          </div>
          <div class="mt-5 md:col-span-2 md:mt-0">
            <form action="/resource/item" method="POST">
              @csrf
              <div class="overflow-hidden shadow sm:rounded-md">
                <div class="bg-white px-4 py-5 sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    {{-- <div class="col-span-6 sm:col-span-3"> --}}
                      {{-- <label for="item-code" class="block text-sm font-medium text-gray-700">Item Code</label> --}}
                      <input type="hidden" name="item-code" id="item-code" autocomplete="item-code" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" disabled>
                    {{-- </div> --}}
      
                    <div class="col-span-6 sm:col-span-6">
                      <label for="item-name" class="block text-sm font-medium text-gray-700">Item Name</label>
                      <input type="text" name="item-name" id="item-name" autocomplete="item-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('item-name') invalid:border-red-700 @enderror" >
                      @error('item-name')
                      <div class="text-sm text-red-600">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
      
                    <div class="col-span-6 sm:col-span-6">
                      <label for="cust-pn" class="block text-sm font-medium text-gray-700">Cust PN</label>
                      <input type="text" name="cust-pn" id="cust-pn" autocomplete="cust-pn" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('cust_pn') invalid:border-red-700 @enderror">
                      @error('cust-pn')
                      <div class="text-sm text-red-600">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
      
                    <div class="col-span-6 sm:col-span-3">
                      <label for="categories" class="block text-sm font-medium text-gray-700">Category Code</label>
                      <select id="categories" name="categories" autocomplete="categories" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm @error('categories') invalid:border-red-700 @enderror" >
                        <option selected>-Choose Item Categories-</option>
                        @foreach ($categories as $cateD)
                        <option value="$cateD->category_id">{{ $cateD->cate_nm }}</option>
                        @endforeach
                      </select>
                      @error('categories')
                      <div class="text-sm text-red-600">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label for="loc" class="block text-sm font-medium text-gray-700">Location Code</label>
                      <select id="loc" name="loc" autocomplete="loc" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm @error('loc') invalid:border-red-700 @enderror">
                        <option></option>
                        <option></option>
                        <option></option>
                      </select>
                      @error('loc')
                      <div class="text-sm text-red-600">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
      
                    <div class="col-span-6 sm:col-span-3">
                      <label for="unit" class="block text-sm font-medium text-gray-700">Unit Code</label>
                      <select id="unit" name="unit" autocomplete="unit" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm @error('unit') invalid:border-red-700 @enderror" >
                        <option selected>-Choose Item Unit-</option>
                        @foreach ($unit as $units)
                        <option value="$units->unit_id">{{ $units->unit_nm }}</option>
                        @endforeach
                      </select>
                      @error('unit')
                      <div class="text-sm text-red-600">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
      
                    <div class="col-span-6 sm:col-span-3">
                      <label for="pck" class="block text-sm font-medium text-gray-700">Packing Unit Code</label>
                      <select id="pck" name="pck" autocomplete="pck" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm @error('pck') invalid:border-red-700 @enderror">
                        <option selected>-Choose Packing Unit-</option>
                        @foreach ($unit as $units)
                        <option value="$units->unit_id">{{ $units->unit_nm }}</option>
                        @endforeach
                      </select>
                      @error('pck')
                      <div class="text-sm text-red-600">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
      
                    <div class="col-span-6 sm:col-span-6">
                      <label for="country" class="block text-sm font-medium text-gray-700">Customer Code</label>
                      <select id="customer" name="customer" autocomplete="customer" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm @error('customer') invalid:border-red-700 @enderror" >
                        <option selected>-Choose Customer-</option>
                        @foreach ($customer as $custom)
                        <option value="$custom->customer_id">{{ $custom->cust_nm }}</option>
                        @endforeach
                      </select>
                      @error('customer')
                      <div class="text-sm text-red-600">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
      
               
                   
                      <div class="col-span-6 sm:col-span-3">
                        <label for="buy" class="block text-sm font-medium text-gray-700">Buy Price</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                          <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">Rp. </span>
                          <input type="number" name="buy" id="buy" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('buy') invalid:border-red-700 @enderror" placeholder="IDR">
                        </div>
                        @error('buy')
                        <div class="text-sm text-red-600">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    
                    
                      <div class="col-span-6 sm:col-span-3">
                        <label for="sell" class="block text-sm font-medium text-gray-700">Sell Pirce</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                          <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">Rp.</span>
                          <input type="number" name="sell" id="sell" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('sell') invalid:border-red-700 @enderror" placeholder="IDR">
                        </div>
                        @error('sell')
                        <div class="text-sm text-red-600">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    
            
                  </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                  <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      </section>
      @endsection