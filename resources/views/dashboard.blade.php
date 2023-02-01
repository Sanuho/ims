@extends('layouts.main')
@section('container')



<!-- Hero Section Start -->
<section id="dashboard" class="pt-36 pb-32">
    <div class="contaier">
     <div class="flex flex-wrap">
      <div class="w-full self-center px-16 lg:w-1/2">
       <h1 class="text-base font-semibold text-primary md:text-xl ">Hello There 🖐 ,Welcome to <span class="mt-1 block text-4xl font-bold text-slate-900 lg:text-5xl">IMS</span></h1>
       <h2 class="mb-5 font-medium text-secondary lg:text-2xl ">Inventory Management System</h2>
       <p class="mb-10 text-xs font-medium text-slate-700 leading-relaxed">Version 01</p> 
       <a href="#" class="text-base font-semibold text-white bg-primary py-3 px-8 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Login</a> 
    </div>

    <div class="w-full self-end px-16 lg:w-1/2">
<div class="relative mt-10 lg:right-0 lg:mt-9">
    <img width="400" heigt="400" src="img/3D.png" alt="3D Character" class="relative z-10 mx-auto max-w-full" />
<span class="absolute bottom-0 left-1/2 -translate-x-1/2 md:scale-100">
    <svg width="300" heigt="300" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
    <path fill="#0EA5E9" d="M42,-73.2C54.5,-65.5,64.9,-54.4,71.5,-41.7C78.1,-28.9,81,-14.5,77,-2.3C73,9.9,62.1,19.7,54.7,31.1C47.3,42.4,43.3,
    55.3,34.8,66.1C26.2,76.9,13.1,85.7,1,84C-11.1,82.3,-22.2,70,-32.2,60C-42.2,50,-51,42.3,-59.2,32.6C-67.4,23,-75,11.5,-72.8,1.3C-70.6,-8.9,
    -58.5,-17.8,-52.4,-31.1C-46.3,-44.4,-46.2,-62.1,-38.4,-72.6C-30.7,-83.1,-15.3,-86.5,-0.3,-85.9C14.7,-85.4,29.5,-81,42,-73.2Z" 
    transform="translate(100 100) scale(1.1)" />
  </svg>
</span>
</div>
    </div>

     </div>
    </div>
</section>
<!-- Hero Section End -->






@endsection