const name = document.getElementById("name");
const place = document.getElementById("place");
const phone = document.getElementById("tele");
const email = document.getElementById("mail");
const stDate = document.getElementById("St-Date");
const guide = document.getElementById("guides");
const enDate = document.getElementById("En-Date");
const perHour = document.getElementById("perhour");
const price = document.getElementById("price");
const cardNumber = document.getElementById("credit-card");
const submitBtn = document.getElementById("submit-btn");
const reset = document.getElementById("reset");

//all the informations must be saved to the local storage
// then we can fetch and use the data stored
//checking date
// calculating price based on the selected tour guide
var tourGuidesDB = (tourGuidesDB = JSON.parse(
        localStorage.getItem("tourGuidesDB")
    ) ?
    (tourGuidesDB = JSON.parse(localStorage.getItem("tourGuidesDB"))) :
    []);
//const passengers = [{FullName:"name",place:"Somewhere",phone:"56234",email:"ASDf@afa",guide:"name",stDate:"date",enDate:"jsaf",cardNum:2345,price:223}];

//localStorage.setItem("tourGuidesDB",JSON.stringify(tourGuidesDB));
var selectedGuidePrice = 0;
submitBtn.onclick = (e) => {
    const tourist = {
        FullName: `${name.value.trim()}`,
        place: `${place.value.trim()}`,
        phone: `${phone.value.trim()}`,
        email: `${email.value.trim()}`,
        guide: `${guide.value.trim()}`,
        stDate: `${stDate.value.trim()}`,
        enDate: `${enDate.value.trim()}`,
        cardNum: `${cardNumber.value.trim()}`,
        perhour: `${perHour.value.trim()}`,
        price: `${price.value.trim()}`,
    };
    console.log(tourist);

    // e.preventDefault();
    validateUsername();
    validateCreditCard();
    validatePhone();
    validateEmail();
    validateDate();
    console.log(phone.value, email.value, name.value, stDate.value.trim());
    if (
        validateUsername() &&
        validateCreditCard() &&
        validateDate() &&
        validatePhone() &&
        validateEmail()
    ) {
        tourGuidesDB.push(tourist);
        localStorage.setItem("tourGuidesDB", JSON.stringify(tourGuidesDB));
        alert("Thank you we will send a verification mesasge to your email");
        return true;
    } else {
        return false;
    }
};