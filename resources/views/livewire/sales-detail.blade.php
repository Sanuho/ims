<div class="mt-5 md:col-span-2 md:mt-0">
    <form action="/sale" method="POST">
      @csrf
      <div class="overflow-hidden shadow sm:rounded-md">
        <div class="bg-white px-4 py-5 sm:p-6">
          
            <input type="text" wire:model="so_no" id="so_no" value="$sono"><input type="text" name="status" id="status" value="1">
            <div class="col-span-6 sm:col-span-6" wire:ignore>
              <label for="country" class="block text-sm font-medium text-gray-700">Sales Date</label>
              <input id="datetimepicker" wire:model="so_dt" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" type="datetime-local" placeholder="Please select a date" />
            
            </div>
            
            

            <div class="col-span-6 sm:col-span-6">
              <label for="country" class="block text-sm font-medium text-gray-700">Customer</label>
              <select  id="customer" wire:model="customer_id" autocomplete="customer" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none @error('customer_id') invalid:border-red-700 @enderror">
                <option selected>-Choose Customer-</option>
                @foreach ($customer as $custom)
                <option value="{{ $custom->id }}">{{ $custom->cust_nm }}</option>
                @endforeach
              </select>
              @error('customer_id')
              <div class="text-sm text-red-600">
                {{ $message }}
              </div>
              @enderror
            </div>


            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500" id="dynamicAddRemove">
              <tr>
                <th class="px-16 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Item Code</th>
                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Quantity</th>
                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
              </tr>
              <tr>
                <td class="align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <select  id="items_id" wire:model.lazy="items_id.0" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                  @foreach ($item as $items)
                  <option value="{{ $items->id }}">{{ $items->item_cd.' - '.$items->item_nm }}</option>
                  @endforeach
                </select></td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"><input type="number" wire:model="qty.0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" /></td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"><button type="button" name="add" id="dynamic-ar" class="bg-gradient-to-tl from-green-600 to-lime-400 px-2 text-xs rounded-full py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white hover:opacity-80" wire:click.prevent="add({{$i}})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  </button></td>
              </tr>

              @foreach($inputs as $key => $value)
              <tr>
                <td class="align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <select  id="items_id" wire:model="items_id.{{ $value }}" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                  @foreach ($item as $items)
                  <option value="{{ $items->id }}">{{ $items->item_cd.' - '.$items->item_nm }}</option>
                  @endforeach
                </select></td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"><input type="number" wire:model="qty.{{ $value }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" /></td>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"><button type="button" class="bg-gradient-to-tl from-red-600 to-lime-400 px-2 text-xs rounded-full py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white hover:opacity-80 remove-input-field" wire:click.prevent="remove({{$key}})"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></button></td>
            </tr>


              @endforeach
          </table>
            

          
        </div>
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
          <button wire:click.prevent="store()" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
        </div>
      </div>
    </form>
  </div>


