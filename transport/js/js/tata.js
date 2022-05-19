function passValues() {
    var model = document.querySelector("h1").innerHTML;
    var price = document.getElementById("price").innerHTML;
    localStorage.setItem("modelOfCar", model);
    localStorage.setItem("priceOfCar", price);
    var form = document.getElementById("form1");
}

window.addEventListener('scroll', reveal);
function reveal() {
    var reveals = document.querySelectorAll('.scroll');
    for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var revealTop = reveals[i].getBoundingClientRect().top;
        var revealPoint = 150;

        if (revealTop < windowHeight - revealPoint) {
            reveals[i].classList.add('active');
        }
        else {
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



var starCounter;
var averageStar;

starCounter = JSON.parse(localStorage.getItem("tataVote")) ? JSON.parse(localStorage.getItem("tataVote")) : 0
averageStar = JSON.parse(localStorage.getItem("tataRating")) ? JSON.parse(localStorage.getItem("tataRating")) : 0
function countAndDisplay(starValue) {
    let starReceived = parseInt(starValue);



    averageStar = ((averageStar * starCounter) + starReceived) / (starCounter + 1);
    starCounter++;

    localStorage.setItem('tataVote', JSON.stringify(starCounter));
    localStorage.setItem('tataRating', JSON.stringify(averageStar));
    console.log(starCounter);
    console.log(averageStar);

    displayVotesAndRates();


    for (var i = 0; i <= 4; i++) {
        document.getElementsByClassName("displayRate")[i].classList.remove("fillYellow");
    }
    starToDisplay();

}


function displayVotesAndRates() {
    document.getElementById("votes").innerHTML = starCounter;
    document.getElementById("rates").innerHTML = averageStar.toFixed(2);
}
displayVotesAndRates();

function starToDisplay() {
    if (averageStar >= 1) {
        document.getElementById("span1").style.opacity = 1;
        document.getElementById("span1").classList.add("fillYellow");
    }
    if (averageStar >= 2) {
        document.getElementById("span2").style.opacity = 1;
        document.getElementById("span2").classList.add("fillYellow");
    }
    if (averageStar >= 3) {
        document.getElementById("span3").style.opacity = 1;
        document.getElementById("span3").classList.add("fillYellow");
    }
    if (averageStar >= 4) {
        document.getElementById("span4").style.opacity = 1;
        document.getElementById("span4").classList.add("fillYellow");
    }
    if (averageStar == 5) {
        document.getElementById("span5").style.opacity = 1;
        document.getElementById("span5").classList.add("fillYellow");
    }


    var opac = averageStar - Math.floor(averageStar);

    for (var i = 0; i <= 5; i++) {
        if (averageStar > i && averageStar < i + 1) {
            if (opac >= 0.1 && opac < 0.2) {
                document.getElementsByClassName("displayRate")[i].style.opacity = 0.1;
                document.getElementsByClassName("displayRate")[i].classList.add("fillYellow");
            }
            else if (opac >= 0.2 && opac < 0.3) {
                document.getElementsByClassName("displayRate")[i].style.opacity = 0.2;
                document.getElementsByClassName("displayRate")[i].classList.add("fillYellow");
            }
            else if (opac >= 0.3 && opac < 0.4) {
                document.getElementsByClassName("displayRate")[i].style.opacity = 0.3;
                document.getElementsByClassName("displayRate")[i].classList.add("fillYellow");
            }
            else if (opac >= 0.4 && opac < 0.5) {
                document.getElementsByClassName("displayRate")[i].style.opacity = 0.4;
                document.getElementsByClassName("displayRate")[i].classList.add("fillYellow");
            }
            else if (opac >= 0.5 && opac < 0.6) {
                document.getElementsByClassName("displayRate")[i].style.opacity = 0.5;
                document.getElementsByClassName("displayRate")[i].classList.add("fillYellow");
            }
            else if (opac >= 0.6 && opac < 0.7) {
                document.getElementsByClassName("displayRate")[i].style.opacity = 0.6;
                document.getElementsByClassName("displayRate")[i].classList.add("fillYellow");
            }
            else if (opac >= 0.7 && opac < 0.8) {
                document.getElementsByClassName("displayRate")[i].style.opacity = 0.7;
                document.getElementsByClassName("displayRate")[i].classList.add("fillYellow");
            }
            else if (opac >= 0.8 && opac < 0.9) {
                document.getElementsByClassName("displayRate")[i].style.opacity = 0.8;
                document.getElementsByClassName("displayRate")[i].classList.add("fillYellow");
            }
            else if (opac >= 0.9 && opac < 1) {
                document.getElementsByClassName("displayRate")[i].style.opacity = 0.9;
                document.getElementsByClassName("displayRate")[i].classList.add("fillYellow");
            }

        }
    }


}
starToDisplay();
