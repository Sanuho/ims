    // Navbar Fixed
window.onscroll= function(){
    const header = document.querySelector('header');
    const fixedNav = header.offsetTop;

    if(window.pageYOffset > fixedNav){
        header.classList.add('navbar-fixed');
    }else{
        header.classList.remove('navbar-fixed');
    }

};

    // Burger button Function
const burger = document.querySelector('#burger');
const navMenu = document.querySelector('#nav-menu');

burger.addEventListener('click',function(){
    burger.classList.toggle('burger-active');
    navMenu.classList.toggle('hidden');    
});


var alert_del = document.querySelectorAll('.alert-del');
alert_del.forEach((x) =>
  x.addEventListener('click', function () {
    x.parentElement.classList.add('hidden');
  })
);

// //dropdown

// const dropdownbutton = document.querySelector('#dropdown-button')
// const dropdowncontent = document.querySelector('#dropdown-content')

// dropdownbutton.addEventListener('click',function(){
//     dropdowncontent.toggle('hidden');

// });