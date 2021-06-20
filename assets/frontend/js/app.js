import getAllItems from './api.js';
import searchStates from './search.js';
import myNavbar from './component/navbar.js';
// import myCarousel from './component/carousel.js';
import * as resultSearchJs from './component/resultSearch.js';

document.addEventListener("DOMContentLoaded", function () {
    
    // event when input search
    resultSearchJs.search.addEventListener('keyup', () => {
        
        if(resultSearchJs.search.value == '') {
            document.getElementById('count_result').innerHTML = '';
            resultSearchJs.resultList.innerHTML = '';
            getAllItems();
        }
    
        searchStates(resultSearchJs.search.value);
        const itemsElement = document.getElementById('selectedItem');
        itemsElement.innerHTML = ''; 
    });
    
    // Carousel
    // const carousel = new bootstrap.Carousel(myCarousel, {
    //     interval: 2000,
    //     wrap: false
    // });
    
    // Init function
    getAllItems();
    myNavbar();

    // Action navbar on mobile
    const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav__links");

    hamburger.addEventListener("click", mobileMenu);

    function mobileMenu() {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
    }

    const navLink = document.querySelectorAll(".nav__links li");

    navLink.forEach(n => n.addEventListener("click", closeMenu));

    function closeMenu() {
        hamburger.classList.remove("active");
        navMenu.classList.remove("active");
    }

    const btn = document.getElementsByClassName('button-itm');

    for(var i = 0; i<btn.length; i++) {
        let cartBtn = btn[i];
        cartBtn.addEventListener('click', ()=> {
            console.log('oke')
        }); 
    } 

    // Load more conten
    // $(".hidden-box.col-md-4:hidden").slice(0, 4).show();
    // $("body").on('click touchstart', '.load__more', function (e) {
    //     e.preventDefault();
    //     $(".hidden-box.col-md-4:hidden").slice(0, 6).slideDown();
    //     if ($(".hidden-box.col-md-4:hidden").length == 0) {
    //         $(".load__more").css('visibility', 'hidden');
    //     }else{
    //         $(".load__more").css('visibility', 'visible');
    //     }
    //     $('html,body').animate({
    //         scrollTop: $(this).offset().top
    //     }, 1000);
    // }); 

});



