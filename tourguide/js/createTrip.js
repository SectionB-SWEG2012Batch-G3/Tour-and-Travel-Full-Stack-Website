const name = document.getElementById("name");
const place = document.getElementById("place");
const phone = document.getElementById("tele");
const email = document.getElementById("mail");
const stDate = document.getElementById("St-Date");
const guide = document.getElementById("guides");
const enDate = document.getElementById("En-Date");
const perHour = document.getElementById("perhour");
console.log("price ", perHour.value);
const price = document.getElementById("price");
const cardNumber = document.getElementById("credit-card");
const submitBtn = document.getElementById("submit-btn");
const reset = document.getElementById("reset");


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
        alert("Thank you we will send a verification mesasge to your email");
        return true;
    } else {
        return false;
    }
};