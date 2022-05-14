/*const submitBtn = document.querySelector("input[id='submit']");
const username =  document.getElementById("username");
const password = document.getElementById("password");
const phone = document.getElementById("tele");
const confirmP = document.getElementById("confirm");
const email = document.getElementById("email");
const eye = document.querySelector(".fa-eye");
const eye2 =document.querySelector(".fa-eye-slash");
const pass = document.querySelector("input[id='password']");
const eye3 = document.querySelector(".eye3")
const eye4 = document.querySelector(".eye4");
const conf = document.querySelector("input[id='confirm']");*/
const eye = document.querySelector(".fa-eye");
const eye2 =document.querySelector(".fa-eye-slash");
//const cardNumber = document.getElementById("credit-card");
function setError(elme,message){
    const div = elme.parentNode;
    const small = div.querySelector("small");
    small.innerText = message;
    div.classList.remove("success");
    div.classList.add("error");
 }

function validateUsername(){
    let regExp = /^([A-Za-z])+\w*\w{6,25}$/;
    const inputsValue = name.value.trim();
    if(inputsValue === ''){
        setError(name,"user name is required");
        return false;
    }else if(inputsValue.length < 6){
        setError(name,"Username must be more than 6 characters");
        return false;
    }else if(inputsValue.length > 25){
        setError(name,"Username can't be more than 15 characters");
        return false;
    }
    else if(!regExp.test(inputsValue)){ // don't forget
        setError(name,"Username doesn't match the pattern");
        return false;
    }
    else{
        name.parentNode.classList.remove("error");
        name.parentNode.classList.add("success");
        const small = name.parentNode.querySelector("small");
        small.innerHTML = '';
        return true;
    }    
}

function validateCreditCard(){
    const inputsValue = cardNumber.value.trim();
    if(inputsValue === ''){
        setError(cardNumber,"Credit card number is required");
        return false;
    }else if(inputsValue.length < 6){
        setError(cardNumber,"Credit card number must be more than 6 characters");
        return false;
    }else if(inputsValue.length > 16){
        setError(cardNumber,"Credit card number can't be more than 15 characters");
        return false;
    }else if(!/(\d{6,15}$)/.test(inputsValue)){
        setError(cardNumber,"Credit card must be a numerical value only");
        return false;
    }
    else{
        cardNumber.parentNode.classList.remove("error");
        cardNumber.parentNode.classList.add("success");
        const small = cardNumber.parentNode.querySelector("small");
        small.innerHTML = '';
        return true;
    }    
}

function validateEmail(){
    const emailRegEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const emailValue = email.value.trim();
    if(emailValue == ''){
        setError(email,"Email is required");
    }else if(!emailRegEx.test(emailValue)){
        setError(email,"Email is not valid");
    }
    else{
        email.parentNode.classList.remove("error");
        email.parentNode.classList.add("success");
        const small = email.parentNode.querySelector("small");
        small.innerHTML = '';
        return true;
    }
}

function validatePhone(){
    const telRegEx = /^(\+251|0)([\s-]?9\d{1}|(9\d{1}))[\s-]?\d{3}[\s-]?\d{4}$/;  //(\+251|0)([\s-]?9\d{1}|(9\d{1}))[\s-]?\d{3}[\s-]?\d{4}$
    const inputsValue = phone.value.toString();
    if(inputsValue === ''){
        setError(phone,"Phone number is required");
        return false;
    }else if(inputsValue.length < 10){
        console.log("too few chars");
        setError(phone,"Phone number can't be less than 10 characters");
        return false;
    }else if(inputsValue.length > 15){
        console.log("too much chars");
        setError(phone,"Phone number can't be more than 15 characters");
        return false;
    }else if(!telRegEx.exec(inputsValue)){
        console.log("pattern problem");
        setError(phone,"Please match the phone number pattern");
        return false;
    }
    else{
        phone.parentNode.classList.remove("error");
        phone.parentNode.classList.add("success");
        const small = phone.parentNode.querySelector("small");
        small.innerHTML = '';
        return true;
    }    
}

function eyeVisibility(){
    var passwordIN = cardNumber.value.trim();
    console.log(cardNumber);
    console.log(cardNumber.value);
    console.log(passwordIN === '');
    if(cardNumber.value.trim() === ''){
        eye.id = "off";
        eye2.setAttribute("id", "off");
    }else{
        eye.id = "on";
        eye2.id = "off";
    }
}

window.addEventListener("load",eyeVisibility);
cardNumber.onfocus = eyeVisibility;
cardNumber.onkeyup = eyeVisibility;

eye.addEventListener("click",toggle);
eye2.addEventListener("click",toggle);
function toggle(){
    if(eye.id == "on"){
        eye.id = "off";
        cardNumber.type = "text";
    }else{
        eye.id = "on";
        cardNumber.type = "password";
    }

    if(eye2.id == "on"){
        eye2.id = "off";
        cardNumber.type = "password";
    }else{
        eye2.id = "on";
        cardNumber.type = "text";
    }
}
enDate.onblur = validateDate;
stDate.onblur = validateDate;

function validateDate(){
    let currDate = new Date();
    currDate = new Date(currDate.toISOString());
    let endDate = new Date(enDate.value);
    let startDate = new Date(stDate.value);
    let status = false;
    console
    console.log(endDate - currDate);
    if((endDate - currDate) > 0){
        console.log("correct end date");
        enDate.parentNode.classList.remove("error");
        enDate.parentNode.classList.add("success");
        const small = enDate.parentNode.querySelector("small");
        small.innerHTML = '';
        status = true;
    }else if(isNaN(endDate)){
        setError(enDate,"please insert end date");
    }
    else{
        setError(enDate,"The date inserted has passed");
    }
    console.log(startDate - currDate);
    if((startDate - currDate) > 0){
       console.log("correct st date");
       stDate.parentNode.classList.remove("error");
       stDate.parentNode.classList.add("success");
       const small = stDate.parentNode.querySelector("small");
       small.innerHTML = '';
    }else if(isNaN(startDate)){
        setError(stDate,"please insert start date");
    }else{
        setError(stDate,"The date inserted has passed");
        if(status){
            status = false;
        }
    }
    return status; 
}