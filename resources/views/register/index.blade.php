@extends('layouts.secondary')
@section('container')

<section class="bg-gray-50 ">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center pt-20 mb-6 text-2xl font-semibold text-primary ">
            
            IMS   
        </a>
        <div class="w-full bg-white rounded-lg shadow-2xl border md:mt-0 sm:max-w-md xl:p-0 ">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                    Register New Account
                </h1>
                <form class="space-y-4 md:space-y-6" action="/register" method="post">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary focus:border-blue-600 block w-full p-2.5 "  placeholder="name" >
                    </div>
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary focus:border-blue-600 block w-full p-2.5"  placeholder="Username" >
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary focus:border-blue-600 block w-full p-2.5 "  placeholder="name@company.com" >
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary focus:border-bkye-600 block w-full p-2.5 " >
                    </div>
                 
                    {{-- <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                              <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary  " required="">
                            </div>
                            <div class="ml-3 text-sm">
                              <label for="remember" class="text-gray-500 ">Remember me</label>
                            </div>
                        </div>
                        <a href="/forgot" class="text-sm font-medium text-primary-600 hover:underline ">Forgot password?</a>
                    </div> --}}
                    <button type="submit" class="w-full text-white bg-primary hover:opacity-80 focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Register</button>
                    <p class="text-sm font-light text-gray-500 ">
                        Already have an account? <a href="/login" class="font-medium text-primary hover:underline ">Login Here!</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
  </section>
@endsection