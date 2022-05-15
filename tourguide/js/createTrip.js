const name = document.getElementById("name");
const place =  document.getElementById("place");
const phone = document.getElementById("tele");
const email = document.getElementById("mail");
const stDate = document.getElementById("St-Date");
const guide = document.getElementById("guides");
const enDate = document.getElementById("En-Date");
const perHour = document.getElementById("perhour");
const price = document.getElementById("price");
const cardNumber = document.getElementById("credit-card");
const submitBtn = document.getElementById("submit-btn")
const reset = document.getElementById("reset");

//all the informations must be saved to the local storage 
// then we can fetch and use the data stored
//checking date 
// calculating price based on the selected tour guide
var selectedCarPrice = 0;
perHour.value = localStorage.getItem("price");
console.log(localStorage.getItem("price"), perHour.value);
guide.value =localStorage.getItem("savedGuide");
console.log(localStorage.getItem("savedGuide"),guide.value);
var tourGuidesDB = tourGuidesDB = JSON.parse(localStorage.getItem("tourGuidesDB"))?tourGuidesDB = JSON.parse(localStorage.getItem("tourGuidesDB")):[];
//const passengers = [{FullName:"name",place:"Somewhere",phone:"56234",email:"ASDf@afa",guide:"name",stDate:"date",enDate:"jsaf",cardNum:2345,price:223}];

//localStorage.setItem("tourGuidesDB",JSON.stringify(tourGuidesDB));

submitBtn.onclick = (e) => {
    const tourist = 
        {FullName:`${name.value.trim()}`,
        place:`${place.value.trim()}`,
        phone:`${phone.value.trim()}`,
        email:`${email.value.trim()}`,
        guide:`${guide.value.trim()}`,
        stDate:`${stDate.value.trim()}`,
        enDate:`${enDate.value.trim()}`,
        cardNum:`${cardNumber.value.trim()}`,
        perhour:`${perHour.value.trim()}`,
        price:`${price.value.trim()}`
        };
    console.log(tourist);
   // e.preventDefault();
    validateUsername();
    validateCreditCard();
    validatePhone();
    validateEmail();
    validateDate();
    console.log(phone.value,email.value,name.value,stDate.value.trim());
    if(validateUsername() && validateCreditCard() && validateDate() && validatePhone() && validateEmail()){
        if(checkDate(stDate.value,enDate.value,guide.value)){
            tourGuidesDB.push(tourist);
            localStorage.setItem("tourGuidesDB",JSON.stringify(tourGuidesDB));
            alert("Thank you we will send a verification mesasge to your email");
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
};

function checkDate(stDate,enDate,name){
    if(!JSON.parse(localStorage.getItem("tourGuidesDB"))){

    }else{
        for(let data of JSON.parse(localStorage.getItem("tourGuidesDB"))){
            if(name == data.guide){
                if( (stDate >= data.stDate && enDate <= data.enDate) || 
                (stDate <= data.stDate && enDate >= data.enDate) ||  
                (stDate >= data.stDate && stDate <= data.enDate) || 
                (enDate <= data.enDate && enDate >= data.stDate) ){
                    alert(name + " has a schedule betwen " + data.stDate +" and " + data.enDate);
                    return false;
                }
            }
        }
    }
    return true;
}

function setP(){
    if(guide.value == 'Haymanot Demis'){
        perHour.value = 60+" Birr per hour";
        selectedCarPrice = 60;
    }
    else if(guide.value == 'Fuad Miftah'){
        perHour.value = 70 +"Birr per hour";
        selectedCarPrice = 70;
    }
    else if(guide.value == 'Hamere Endale'){
       perHour.value = 70 +"Birr per hour";
        selectedCarPrice = 70;
    }
    else if(guide.value == 'Hana Chane'){
        perHour.value = 65 +"Birr per hour";
        selectedCarPrice = 65;
    }
    else if(guide.value == 'Haileamlak Desalegn'){
        perHour.value = 80 +"Birr per hour";
        selectedCarPrice = 80;
    }
    else if(guide.value == 'Henok Kefale'){
        perHour.value = 170 +"Birr per hour";
        selectedCarPrice = 170;
    }
    else if(guide.value == 'Hiwot Birhanu'){
        perHour.value = 150 +"Birr per hour";
        selectedCarPrice = 150;
    }
    else if(guide.value == 'Natnael Girma'){
        perHour.value = 165 +"Birr per hour";
        selectedCarPrice = 165;
    }
    else{
        perHour.value = "select the car again";
        selectedCarPrice = 0;
    }
    totalPrice();
}

setP();

 enDate.onchange = totalPrice;
 stDate.onchange = totalPrice;
 guide.onchange = setP;

function totalPrice(){ // calculate price
    var d1 = document.getElementById("St-Date").value;
    var d2 = document.getElementById("En-Date").value;
    console.log(d1,d2);
    const date1 = new Date(d1);
    const date2 = new Date(d2);
    const time = date2 - date1;
    const days = Math.ceil(time / (1000*60*60*24));
  
    if(isNaN(days)){
      return;
    }
     else {
         if(days < 0){
            alert("Invalid date,start date is greater than the end date");
            enDate.value = null;
            price.value = null;
         }
         else{
            if(selectedCarPrice!=0){
        price.value = (days*selectedCarPrice) + 'Birr';
                }
            else{
               alert("select name of the tour guide first and make sure ammount per day is displayed");
               stDate.value = null;
               enDate.value = null;
               price.value = null;
            }
        }
    }
}

options = guide.querySelectorAll("option");
for(let elem of options){
    elem.onclick = ()=>{
        guide.value = elem.value;
    }
}
 

//select a tour guide => change perHour and total price