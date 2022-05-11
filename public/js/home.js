const navbarMb = document.querySelector('.header_mb_navbar')
const navbarMbBtn = document.querySelector('.header_mb_bottom_baricon')
const backdropMb = document.querySelector('.header_mb_back_drop')
const closeNavbar = document.querySelector('.header_mb_navbar_close_icon')


navbarMbBtn.onclick = () => {
    navbarMb.style.transform = "translateX(0)"
    backdropMb.style.transform = "translateX(0)"
}

backdropMb.onclick = () => {
    navbarMb.style.transform = "translateX(-100%)"
    backdropMb.style.transform = "translateX(-100%)"
}

closeNavbar.onclick = () => {
    navbarMb.style.transform = "translateX(-100%)"
    backdropMb.style.transform = "translateX(-100%)"
}