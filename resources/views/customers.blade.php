@extends('layouts.main')
@include('partials.pageheader')
@section('container')
<section id="customers" class="pt-8 pb-32">


<!-- TABLE START-->
    <div class="relative">
        <div class="flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
              <h6>Customer Lists</h6>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
              <div class="relative p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                  <thead class="align-bottom">
                    <tr>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Customer Code</th>
                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Customer Name</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Address</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">PIC</th>
                        <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      {{ $customer->cust_cd }}
                      </td>
                      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      {{ $customer->cust_nm }}
                      </td>
                      <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                      {{ $customer->cust_cd }} 
                      </td>
                      <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      {{ $customer->cust_cd }}
                      </td>
                      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <a href="items/{{ $customer->cust_cd }}" class="font-semibold leading-tight text-xs text-slate-400"><span class="bg-gradient-to-tl from-green-600 to-lime-400 px-3 text-xs rounded-xl py-2.5 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white hover:opacity-80"> Edit </span></a>
                        <a href="javascript:;" class="font-semibold leading-tight text-xs text-slate-400"><span class="bg-gradient-to-tl from-red-600 to-lime-400 px-3 text-xs rounded-xl py-2.5 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white hover:opacity-80"> Delete </span></a>
                        <a href="javascript:;" class="font-semibold leading-tight text-xs text-slate-400"><span class="bg-gradient-to-tl from-black to-slate-500 px-3 text-xs rounded-xl py-2.5 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white hover:opacity-80"> Print </span></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <nav class="flex items-center justify-between pt-4" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span class="font-semibold text-gray-900 dark:text-white">1000</span></span>
                    <ul class="inline-flex items-center -space-x-px">
                        <li>
                            <a href="#" class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-primary border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 ">
                                <span class="sr-only">Previous</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-primary border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">1</a>
                        </li>
                        <li>
                            <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-primary border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">2</a>
                        </li>
                        <li>
                            <a href="#" aria-current="page" class="z-10 px-3 py-2 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 ">3</a>
                        </li>
                        <li>
                            <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-primary border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">...</a>
                        </li>
                        <li>
                            <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-primary border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">100</a>
                        </li>
                        <li>
                            <a href="#" class="block px-3 py-2 leading-tight text-gray-500 bg-primary border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 ">
                                <span class="sr-only">Next</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            </a>
                        </li>
                    </ul>
                </nav>
              </div>
            </div>
          </div>
    </div>


<!-- TABLE END -->

</section>
@endsection
