var slideIndex, slides, dots, captionText
var timer = null



const slideShow = {
    initGallery: function(){
        slideIndex = 0
        slides = document.getElementsByClassName('imageHolders')
        slides[slideIndex].style.opacity = 1

        dots = []
        var dotsContainer = document.querySelector('.dotsContainer')
        for(var i = 0; i <slides.length; i++){
            var dot = document.createElement('span')
            dot.classList.add('dots')
            dot.setAttribute("onClick", "slideShow.moveSlides("+i+")")
            dotsContainer.appendChild(dot)
            dots.push(dot)
        }

        dots[slideIndex].classList.add('active')
        },
        moveSlides: function(n){
            var i, current, next;
            var moveSlideAnimClass = {
                forCurrent: '',
                forNext: ''
            }
            if(n>slideIndex){
                if(n>slides.length - 1)
                {
                    n = 0
                }
                moveSlideAnimClass.forCurrent = 'moveLeftCurrentSlides'
                moveSlideAnimClass.forNext = 'moveLeftNexttSlides'
            }else if( n<slideIndex){
                if(n < 0)
                {
                    n = slides.length - 1
                }
                moveSlideAnimClass.forCurrent = 'moveRightCurrentSlides'
                moveSlideAnimClass.forNext = 'moveRightNexttSlides'
            }
            if(n != slideIndex){
                next = slides[n]
                current = slides[slideIndex]
                for( var i = 0; i < slides.length; i++){
                    slides[i].className = 'imageHolders'
                    slides[i].style.opacity = 0
                    dots[i].classList.remove('active')
                }
                current.classList.add(moveSlideAnimClass.forCurrent)
                next.classList.add(moveSlideAnimClass.forNext)
                dots[n].classList.add('active')
                slideIndex = n
            }
        },
        setTimeSlide: function(){
            timer = setInterval(() => {
                plusSlides(1)
            }, 5000);
        },
        start: function(){
            this.initGallery()
            this.setTimeSlide()
        }
        
}

function plusSlides(n){
    slideShow.moveSlides(slideIndex + n)
}

slideShow.start()


// ---------------------countdown sale--------------------
const countPromotionDate = document.querySelectorAll('.countdown__product--time .box__timecount.init--day .manTime')
const countPromotionHour = document.querySelectorAll('.countdown__product--time .box__timecount.init--hour .manTime')
const countPromotionMinute = document.querySelectorAll('.countdown__product--time .box__timecount.init--minute .manTime')
const countPromotionSecond = document.querySelectorAll('.countdown__product--time .box__timecount.init--second .manTime')
let countDownDate = new Date("Jan 10, 2022 17:30:30").getTime();


let x = setInterval(function() {

    // lấy thời gian hiện tại
    let now = new Date().getTime();
      
    // Khoảng cách từ bây giờ đến hết thời gian khuyến mãi
    let distance = countDownDate - now;
      
    // Tìm ngày, h, phút ,s
    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);
      
    countPromotionDate.forEach(time => {
        time.textContent = days
    })
    countPromotionHour.forEach(time => {
        time.textContent = hours
    })
    countPromotionMinute.forEach(time => {
        time.textContent = minutes
    })
    countPromotionSecond.forEach(time => {
        time.textContent = seconds
    })

    // clearinTerval
    if (distance < 0) {
      clearInterval(x);
      document.querySelector('.countdown__product--time .box__timecount.init--day .manTime').innerHTML = "Hết khuyến mãi";
      document.querySelector('.countdown__product--time .box__timecount.init--hour .manTime').innerHTML = "Hết khuyến mãi";
      document.querySelector('.countdown__product--time .box__timecount.init--minute .manTime').innerHTML = "Hết khuyến mãi";
      document.querySelector('.countdown__product--time .box__timecount.init--second .manTime').innerHTML = "Hết khuyến mãi";
    }
  }, 1000);




