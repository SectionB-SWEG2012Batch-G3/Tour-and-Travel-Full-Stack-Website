const searcInput = document.querySelector(".search-bar-container");
const inputBox = searcInput.querySelector("input");
const suggBox = searcInput.querySelector(".autocom-box");
var searchValueContainer = [];

inputBox.onkeyup = (event) => {
 let inputData = event.target.value;
 searchValueContainer = [];
 if(inputData){
    if(!suggestions.includes(inputBox.value)){
        suggestions.push(inputBox.value);
    }
    searchValueContainer = suggestions.filter((data) => {
        return data.toLowerCase().startsWith(inputData.toLowerCase());
    });
    searchValueContainer = searchValueContainer.map((data)=>{
        return  "<a href = 'destination/addisababa/addisababa.html'>" + data + "</a>";
 //       return  "<li><a href = 'destination/addisababa/addisababa.html'>" + data + "</a></li>";s
    })
    searcInput.classList.add("add");
    showSuggestions(searchValueContainer);
    const listOfSuggestions = suggBox.querySelectorAll("li");
    for(let i = 0; i < listOfSuggestions.length; i++){
      /*  listOfSuggestions[i].onclick = ()=>{
            inputBox.setAttribute("value",listOfSuggestions[i].innerText);
        }  */
        listOfSuggestions[i].setAttribute("onclick","selectSearchValue(this)");
    }
 }
 else{
    searcInput.classList.remove("add");
    showSuggestions(searchValueContainer);
 }
}

function selectSearchValue(element){
    inputBox.setAttribute("value",element.innerText);
    inputBox.value = element.innerText;
}

function showSuggestions(list){
    let listdata;
    if(list.length){
        listdata = list.join("");
    }
    else{
        listdata = `${inputBox.value}`;
    }
    suggBox.innerHTML = listdata;
}

let suggestions = [
    "Addis Ababa",
    "Bahrdar",
    "Hawassa",
    "Lalibela",
    "Semien Mountain",
    "Gonder",
    "Axum",
    "Lake Tana",
    "Vlogger",
    "Vechiles",
    "Facebook",
    "Freelancer",
    "Facebook Page",
    "Designer",
    "Developer",
    "Web Designer",
    "Web Developer",
    "Login Form in HTML & CSS",
    "How to learn HTML & CSS",
    "How to learn JavaScript",
    "How to became Freelancer",
    "How to became Web Designer",
    "How to start Gaming Channel",
    "How to start YouTube Channel",
    "What does HTML stands for?",
    "What does CSS stands for?",
];