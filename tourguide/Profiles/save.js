const div = document.querySelector(".visible");
const assign = div.querySelector(".reserve");
assign.onclick = ()=>{
    localStorage.setItem("savedGuide",assign.id);
    localStorage.setItem("price",assign.title);
}

