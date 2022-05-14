const login = document.querySelector(".login");
login.onclick = ()=>{
    localStorage.setItem("currentPage",window.location.href);
}