document.addEventListener("DOMContentLoaded", function () {

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

    // Alert 
    const message = $('.flash-data').data('tempdata');
    const error   = $('.flash-data-error').data('tempdata');
    const info    = $('.flash-data-info').data('tempdata');
    
    if (error) {
        Swal.fire({
            title: 'Oops...',
            text: error,
            icon: 'error'
        });
    }
    else if(message) {
        Swal.fire({
            title: 'Success',
            text: message,
            icon: 'success'
        });
    }else if(info) {
        Swal.fire({
            title: 'Info',
            text: info,
            icon: 'info'
        });
    }else {
        console.log('Pindah halaman');
    }
});