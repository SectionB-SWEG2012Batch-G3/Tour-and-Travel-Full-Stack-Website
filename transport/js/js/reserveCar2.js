
var datas = new Array();
const addData = (ev) => {
    ev.preventDefault();

    let fullName, credit, email, contact, modelOfCar, pricePerDay, startDate, endDate, total;
    fullName = document.querySelector("#name").value;

    email = document.querySelector("#mail").value;
    contact = document.querySelector("#tele").value;
    modelOfCar = document.querySelector("#modelOfCar").value;
    pricePerDay = document.querySelector("#priceOfCar").value;
    credit = document.querySelector("#credit-card").value;
    startDate = document.querySelector("#startDate").value;
    endDate = document.querySelector("#endDate").value;
    total = document.querySelector("#amountDisplay").value;

    datas = JSON.parse(localStorage.getItem("carReserveList")) ? JSON.parse(localStorage.getItem("carReserveList")) : []

    if (validateUsername() && validateCreditCard() && validateDate() && validatePhone() && validateEmail()) {
        if (dateCheck(startDate, endDate, modelOfCar)) {
            datas.push({
                "fullName": fullName,
                "credit": credit,
                "email": email,
                "contact": contact,
                "modelOfCar": modelOfCar,
                "pricePerDay": pricePerDay,
                "startDate": startDate,
                "endDate": endDate,
                "total": total
            })

            alert("Succesfully scheduled")

            document.location.reload();
            localStorage.setItem('carReserveList', JSON.stringify(datas));
        }
    }
    else {
        alert("Fill every data properly")
    }

}
document.getElementById("btn").addEventListener('click', addData); 


var x = localStorage.getItem("modelOfCar");
var y = localStorage.getItem("priceOfCar");
var pr = parseInt(y,10);
var startD = document.getElementById("startDate").innerHTML;
function autoFill(){

    var s = document.querySelectorAll("option");
    var found = 0;
    
    for(var i=0;i<s.length && found==0;i++){
        if(x == s[i].value){
            s[i].setAttribute("selected", "selected");
            found = 1;
        }
    }

    document.querySelector("#priceOfCar").value = y;

}

var selectedCarPrice = parseInt(y);

function comb(obj){
    if(obj.value == 'Honda City'){
        document.querySelector("#priceOfCar").value = 100+" $ per day";
        selectedCarPrice = 100;
    }
    else if(obj.value == 'Toyota Sedan'){
        document.querySelector("#priceOfCar").value = 65 +" $ per day";
        selectedCarPrice = 65;
    }
    else if(obj.value == 'Vitz'){
        document.querySelector("#priceOfCar").value = 40 +" $ per day";
        selectedCarPrice = 40;
    }
    else if(obj.value == 'Yaris'){
        document.querySelector("#priceOfCar").value = 50 +" $ per day";
        selectedCarPrice = 50;
    }
    else if(obj.value == 'V8'){
        document.querySelector("#priceOfCar").value = 200 +" $ per day";
        selectedCarPrice = 200;
    }
    else if(obj.value == 'Hummer'){
        document.querySelector("#priceOfCar").value = 170 +" $ per day";
        selectedCarPrice = 170;
    }
    else if(obj.value == 'Revo'){
        document.querySelector("#priceOfCar").value = 150 +" $ per day";
        selectedCarPrice = 150;
    }
    else if(obj.value == 'RAV4'){
        document.querySelector("#priceOfCar").value = 165 +" $ per day";
        selectedCarPrice = 165;
    }
    else if(obj.value == 'Hyundai'){
        document.querySelector("#priceOfCar").value = 125 +" $ per day";
        selectedCarPrice = 125;
    }
    else if(obj.value == 'TOYOTA HIACE'){
        document.querySelector("#priceOfCar").value = 100 +" $ per day";
        selectedCarPrice = 100;
    }
    else if(obj.value == 'Tata xenon'){
        document.querySelector("#priceOfCar").innerHTML = 200 +" $ per day";
        selectedCarPrice = 200;
    }
    else if(obj.value == 'Toyota Coaster'){
        document.querySelector("#priceOfCar").value = 180 +" $ per day";
        selectedCarPrice = 180;
    }
    else{
        document.querySelector("#priceOfCar").value = "select the car again";
        selectedCarPrice = 0;
    }

    calculateDays();

}

var startD = document.getElementById("startDate").value;
var endD = document.getElementById("endDate").value;
function getDate(date){
    var dateArr = date.split('/');
    var date = new Date(dateArr[2],dateArr[1],dateArr[0]);
    return date;
}
var date1 = getDate(startD);


function calculateDays(){
    var d1 = document.getElementById("startDate").value;
    var d2 = document.getElementById("endDate").value;
    const date1 = new Date(d1);
    const date2 = new Date(d2);
    const time = date2 - date1;
    const days = Math.ceil(time / (1000*60*60*24));
  
    if(isNaN(days)){
      return;
    }
     else {
         if(days<0){  
         }
         else{
            if(selectedCarPrice!=0){
        document.getElementById("amountDisplay").value=days*selectedCarPrice+'$';
                }
            else{
                alert("select the car first and make sure ammount per day is displayed");
                document.getElementById("startDate").value = null;
                document.getElementById("endDate").value = null;
            }
        }
    }
    
}



const dateCheck = (checks, checke, mCar) => {
    let fDate,lDate,sDate,eDate;
    sDate = Date.parse(checks);
    eDate = Date.parse(checke);
    console.log(sDate);
    

    if(datas.length==0){
        return true;
    }
    else{
    for(var i =0;i< datas.length;i++){
        fDate = Date.parse(datas[i].startDate);
        lDate = Date.parse(datas[i].endDate);

        console.log(datas[i].modelOfCar);
        if(mCar == datas[i].modelOfCar){
        if((sDate <= lDate && sDate >= fDate) || (eDate <= lDate && eDate >= fDate) ||(sDate <= fDate && eDate >= lDate)) {
            alert("This car is alrady scheduled from "+datas[i].startDate+" to "+datas[i].endDate);
            return false;
        }
        }

    }

    return true;

    }

}


function validateDate(){
    let currDate = new Date();
    currDate = new Date(currDate.toISOString());
    let endDate = new Date(enDate.value);
    let startDate = new Date(stDate.value);
    let status = false;
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

    if(isNaN(startDate)){
        setError(stDate,"please insert start date");
    }
    if((endDate - startDate) > 0){
        
        enDate.parentNode.classList.remove("error");
        enDate.parentNode.classList.add("success");
        const small = enDate.parentNode.querySelector("small");
        small.innerHTML = '';
        status = true;
    }else if((endDate - startDate) < 0){
        setError(enDate,"end date is less than start date");
    }

    if(isNaN(endDate)){
        setError(enDate,"please insert end date");
    }
    if((endDate - startDate) > 0){
        
        enDate.parentNode.classList.remove("error");
        enDate.parentNode.classList.add("success");
        const small = enDate.parentNode.querySelector("small");
        small.innerHTML = '';
        status = true;
    }else if((endDate - startDate) < 0){
        setError(stDate,"start date is greater than end date");
    }

    return status; 
}

var enDate = document.getElementById("endDate");
var stDate = document.getElementById("startDate");
enDate.onblur = validateDate;
stDate.onblur = validateDate;


function setError(elme,message){
    const div = elme.parentNode;
    const small = div.querySelector("small");
    small.innerText = message;
    div.classList.remove("success");
    div.classList.add("error");
 }


function validateUsername(){
    let regExp = /^([A-Za-z])+\w*\w{6,25}$/;
    var element = document.querySelector("#name");
    var inputsValue = document.querySelector("#name").value;
    if(inputsValue === ''){
        setError(element,"user name is required");
        return false;
    }else if(inputsValue.length < 6){
        setError(element,"Username must be more than 6 characters");
        return false;
    }else if(inputsValue.length > 25){
        setError(element,"Username can't be more than 15 characters");
        return false;
    }
    else if(!regExp.test(inputsValue)){ 
        setError(element,"Username doesn't match the pattern");
        return false;
    }
    else{
        element.parentNode.classList.remove("error");
        element.parentNode.classList.add("success");
        const small = element.parentNode.querySelector("small");
        small.innerHTML = '';
        return true;
    }    
}
var fullName = document.querySelector("#name");
fullName.onblur =  validateUsername;

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
var email = document.querySelector("#mail");
email.onblur = validateEmail;

function validatePhone(){
    const telRegEx = /^(\+251|0)([\s-]?9\d{1}|(9\d{1}))[\s-]?\d{3}[\s-]?\d{4}$/;  //(\+251|0)([\s-]?9\d{1}|(9\d{1}))[\s-]?\d{3}[\s-]?\d{4}$
    var phone = document.querySelector("#tele");
    var inputsValue = document.querySelector("#tele").value;
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
var contact = document.querySelector("#tele");
contact.onblur = validatePhone;


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
var credit = document.querySelector("#credit-card");
credit.onblur = validateCreditCard;