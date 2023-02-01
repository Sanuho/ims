<!-- Header Start -->
<header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
    <div class="container">
        <div class="flex items-center justify-between relative">
    <div class="px-4">
        <a href="#home" class="font-bold text-lg text-primary block py-6">IMS</a>
    </div>
    <div class="flex items-center px-4">
        <button id="burger" name="burger" type="button" class="block absolute right-4 lg:hidden">
            <span class="burgerbutton-line transition duration-200 ease-in-out"></span>
            <span class="burgerbutton-line transition duration-100 ease-in-out"></span>
            <span class="burgerbutton-line transition duration-200 ease-in-out"></span>   
        </button>
    
        <nav id="nav-menu" class="hidden absolute py-5 bg-slate-200 shadow-lg rounded-lg max-w[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
            <ul class="block lg:flex">
                @auth
                <li class="group ">
                    <a href="/dashboard" class="text-base py-2 mx-8 flex group-hover:text-primary {{ Request::is('dashboard') ? 'text-primary' : 'text-dark' }}">Dashboard</a>
                </li>    
                <li class="group">
                    <div class="dropdown hover:bg-slate-100 rounded">
                        <button  class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Master <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg> </button>
                        <div class="dropdown-menu absolute shadow-lg bg-white hidden">
                        <a href="/items" class="text-base  py-2 mx-8 flex hover:text-primary {{ Request::is('items') ? 'text-primary' : 'text-dark' }}">Item Master</a>
                        <a href="/customers" class="text-base py-2 mx-8 flex hover:text-primary {{ Request::is('customers') ? 'text-primary' : 'text-dark' }}">Customer Master</a>
                        </div>
                      </div>    
                </li>     
                <li class="group">  
                    <div class="dropdown hover:bg-slate-100 rounded">
                        <button  class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Transaction <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg> </button>
                        <div class="dropdown-menu absolute shadow-lg bg-white hidden">
                        <a href="/sales" class="text-base text-dark py-2 mx-8 flex hover:text-primary">Sales</a>
                        <a href="/shipping" class="text-base text-dark py-2 mx-8 flex hover:text-primary">Shipping</a>
                        </div>
                      </div>                   
                </li> 
                <li class="group">
                    <div class="dropdown hover:bg-slate-100 rounded">
                        <button  class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Report <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg> </button>
                        <div class="dropdown-menu absolute shadow-lg bg-white hidden">
                        <a href="/sales_r" class="text-base text-dark py-2 mx-8 flex hover:text-primary">Sales Report</a>
                        <a href="shipping_r" class="text-base text-dark py-2 mx-8 flex hover:text-primary">Shipping Report</a>
                        </div>
                      </div>    
                </li> 

               
                <li class="group">
                    <div class="dropdown hover:bg-slate-100 rounded">
                        <button  class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">{{ auth()->user()->name }} <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg> </button>
                        <div class="dropdown-menu absolute shadow-lg bg-white hidden">
                        <a href="/" class="text-base text-dark py-2 mx-8 flex hover:text-primary">Profile</a>
                        <form action="/logout" method="post">
                            @csrf
                            <button class="text-base text-dark py-2 mx-8 flex hover:text-primary">Logout <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                              </svg>
                            </button>
                        </form>                      
                        </div>
                      </div>    
                </li> 
                @else
                <li class="group">
                    <a href="/login" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Login <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                      </svg>
                    </a>
                </li> 
                @endauth
            

            </ul>
        </nav>
    </div>
        </div>
    </div>
    
    </header>
    <!-- Header End -->

