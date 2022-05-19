var elem = document.querySelector("input[id='fa-bars-label']");
const font = document.querySelector(".fa-bars");
var ul = document.querySelector("nav ul");
function changeFont(){
    if(font.className == "fas fa-bars"){
    font.className = "fas fa-times";
    }else{
    font.className = "fas fa-bars";
    }			   
}
elem.onclick = changeFont;