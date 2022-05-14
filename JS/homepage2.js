window.addEventListener('scroll', reveal);
function reveal(){
    var reveals = document.querySelectorAll('.scrolle');
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


const toTop = document.querySelector(".to-top");
window.addEventListener("scroll", () => {
    if (window.scrollY > 200) {
        toTop.classList.add("visible");
    } else {
        toTop.classList.remove("visible");
    }
});


var video = document.querySelectorAll("video");
console.log(video);

	function PlayVid(vid){
		vid.addEventListener("mouseover",()=>{
			if(vid.id != "auto"){
				vid.play();
				vid.setAttribute("controls","controls");
			}
		})
	}
	video.forEach((vid)=>{
		vid.removeAttribute("controls");
	});

	function PauseVid(vid){
		vid.addEventListener("mouseout",()=>{
			if(vid.id != "auto"){
				vid.pause();
				vid.removeAttribute("controls");
			}
				
			//	vid.currentTime = 0;
		})
	}
		video.forEach(PlayVid);
		video.forEach(PauseVid);



window.addEventListener('scroll', reveal);
function reveal(){
    var reveals = document.querySelectorAll('.scrolle');
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
