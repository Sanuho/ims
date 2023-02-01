@extends('layouts.main')
@section('container')
<section id="item" class="pt-8 pb-32">


    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
          <div class="border-t border-gray-200"></div>
        </div>
      </div>
      
      <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-2 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Sales Order Entry</h3>
              <nav class="flex items-center pt-4">
                <ul>
                  <li class="pr-2">
                    <a href="/sales" class="justify-center rounded-full border border-transparent inline-block bg-green-500 py-2 px-4 text-sm font-medium text-white shadow-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-slate-600 focus:ring-offset-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    </a> 
                  </li>
                </ul>
                {{-- <ul>
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
                </ul>   --}}
              </nav>
              
            </div>
          </div>
          {{-- <div class="mt-5 md:col-span-2 md:mt-0">
            <form action="/sale" method="POST">
              @csrf
              <div class="overflow-hidden shadow sm:rounded-md">
                <div class="bg-white px-4 py-5 sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <input type="text" name="so_no" id="so_no" value=""><input type="text" name="status" id="status" value="1">
                    <div class="col-span-6 sm:col-span-6">
                      <label for="country" class="block text-sm font-medium text-gray-700">Sales Date</label>
                      <input id="datetimepicker" name="so_dt" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" type="datetime-local" placeholder="Please select a date" />
                    </div>
                    

                    <div class="col-span-6 sm:col-span-6">
                      <label for="country" class="block text-sm font-medium text-gray-700">Customer</label>
                      <select  id="customer" name="customer_id" autocomplete="customer" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none @error('customer_id') invalid:border-red-700 @enderror">
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
                          <select  id="item_id" name="addMoreInputFields[0][item_id]" autocomplete="item_id" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm theSelect">
                          @foreach ($item as $items)
                          <option value="{{ $items->item_cd }}">{{ $items->item_cd.' - '.$items->item_nm }}</option>
                          @endforeach
                        </select></td>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"><input type="number" name="addMoreInputFields[0][qty]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" /></td>
                          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"><button type="button" name="add" id="dynamic-ar" class="bg-gradient-to-tl from-green-600 to-lime-400 px-2 text-xs rounded-full py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white hover:opacity-80"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                          </button></td>
                      </tr>
                  </table>
                    

                  


                  
            
                  </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                  <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                </div>
              </div>
            </form>
          </div> --}}

          <!-- LIVEWARE START -->
          @@livewire('user-detail')
          <!-- LIVEWARE START -->
        </div>
      </div>

      </section>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script type="text/javascript">
          var i = 0;
          // $("#dynamic-ar").click(function () {
          //     ++i;
          //     $("#dynamicAddRemove").append('<tr><td class="align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"><select  id="item_id" name="addMoreInputFields[' + i +'][item_id]" autocomplete="item_cd" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm theSelect">@foreach ($item as $items)<option value="{{ $items->item_cd }}">{{ $items->item_cd.' - '.$items->item_nm }}</option>@endforeach</select></td><td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"><input type="text" name="addMoreInputFields[' + i +
          //         '][qty]"class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" /></td><td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"><button type="button" class="bg-gradient-to-tl from-red-600 to-lime-400 px-2 text-xs rounded-full py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white hover:opacity-80 remove-input-field"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></button></td></tr>'
          //         );
                 
          // });
          // $(document).on('click', '.remove-input-field', function () {
          //     $(this).parents('tr').remove();
          // });

          // $(".theSelect").select2();

        config={
          enableTime : true,
          dateFormat : "Y-m-d H:i:s",
        }

        flatpickr("input[type=datetime-local]",config);
      </script>
      @endsection
  