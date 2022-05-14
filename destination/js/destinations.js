
window.addEventListener('scroll', reveal);
function reveal(){
    var reveals = document.querySelectorAll('.scroll');
    for(var i=0; i<reveals.length;i++){
        var windowHeight = window.innerHeight;
        var revealTop = reveals[i].getBoundingClientRect().top;
        var revealPoint = 150;

        if(revealTop < windowHeight - revealPoint){
            reveals[i].classList.add('active');
        }
        else{
            reveals[i].classList.remove('active');
        }
    }
}
        const slider = document.querySelector(".slider");
        const nextBtn = document.querySelector(".next-btn");
        const prevBtn = document.querySelector(".prev-btn");
        const slides = document.querySelectorAll(".slide");
        const slideIcons = document.querySelectorAll(".slide-icon");
        const numberOfSlides = slides.length;
        var slideNumber = 0;

        nextBtn.addEventListener("click", () => {
            slides.forEach((slide) => {
                slide.classList.remove("active")
            });

            slideIcons.forEach((slideIcon) => {
                slideIcon.classList.remove("active")
            });

            slideNumber++;

            if (slideNumber > (numberOfSlides - 1)) {
                slideNumber = 0;
            }

            slides[slideNumber].classList.add("active");
            slideIcons[slideNumber].classList.add("active");

        });

        prevBtn.addEventListener("click", () => {

            slides.forEach((slide) => {
                slide.classList.remove("active")
            });

            slideIcons.forEach((slideIcon) => {
                slideIcon.classList.remove("active")
            });

            slideNumber--;

            if (slideNumber < 0) {
                slideNumber = numberOfSlides - 1;
            }

            slides[slideNumber].classList.add("active");
            slideIcons[slideNumber].classList.add("active");
        });

        var playSlider;
        var repeater = () => {
            playSlider = setInterval(function () {

                slides.forEach((slide) => {
                    slide.classList.remove("active")
                });

                slideIcons.forEach((slideIcon) => {
                    slideIcon.classList.remove("active")
                });

                slideNumber++;

                if (slideNumber > (numberOfSlides - 1)) {
                    slideNumber = 0;
                }

                slides[slideNumber].classList.add("active");
                slideIcons[slideNumber].classList.add("active");
            }, 4000);
        }
        repeater();


        slider.addEventListener("mouseover", () => {
            clearInterval(playSlider);
        });

        slider.addEventListener("mouseout", () => {
            repeater();
        });