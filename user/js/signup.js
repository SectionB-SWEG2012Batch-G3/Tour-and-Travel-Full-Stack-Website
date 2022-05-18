const submitBtn = document.querySelector("input[id='submit']");
const username = document.getElementById("username");
const password = document.getElementById("password");
const phone = document.getElementById("tele");
const confirmP = document.getElementById("confirm");
const email = document.getElementById("email");
const eye = document.querySelector(".fa-eye");
const eye2 = document.querySelector(".fa-eye-slash");
const pass = document.querySelector("input[id='password']");
const eye3 = document.querySelector(".eye3")
const eye4 = document.querySelector(".eye4");
const conf = document.querySelector("input[id='confirm']");
submitBtn.onclick = () => {
    validatePassword();
    ConfirmPassword();
    validateEmail();
    if (validatePassword() && ConfirmPassword() && validateEmail()) {
        return true;
    } else {
        return false;
    }
};

function setError(elme, message) {
    const div = elme.parentNode;
    const small = div.querySelector("small");
    small.innerText = message;
    div.classList.remove("success");
    div.classList.add("error");
}

function validateUsername() {
    let regExp = /^([A-Za-z])+\w{6,30}$/;
    const inputsValue = username.value.trim();
    if (inputsValue === '') {
        setError(username, "user name is required");
        return false;
    } else if (inputsValue.length < 6) {
        setError(username, "Username must be more than 6 characters");
        return false;
    } else if (inputsValue.length > 16) {
        setError(username, "Username can't be more than 15 characters");
        return false;
    } else if (!regExp.test(inputsValue)) { // don't forget
        setError(username, "Username doesn't match the pattern");
        return false;
    } else {
        username.parentNode.classList.remove("error");
        username.parentNode.classList.add("success");
        const small = username.parentNode.querySelector("small");
        small.innerHTML = '';
        return true;
    }
}

function validatePassword() {
    const inputsValue = password.value.trim();
    if (inputsValue === '') {
        setError(password, "Password is required");
        return false;
    } else if (inputsValue.length < 6) {
        setError(password, "Password must be more than 6 characters");
        return false;
    } else if (inputsValue.length > 15) {
        setError(password, "Password can't be more than 15 characters");
        return false;
    } else if (inputsValue.toLowerCase() == "password") {
        setError(password, "password can't be pasword");
    } else {
        password.parentNode.classList.remove("error");
        password.parentNode.classList.add("success");
        const small = password.parentNode.querySelector("small");
        small.innerHTML = '';
        return true;
    }
}

function ConfirmPassword() {
    const inputsValue = password.value.trim();
    const confirmVal = confirmP.value.trim();
    if (confirmVal === '') {
        setError(confirmP, "Please confirm your password");
        return false;
    } else if (confirmVal != inputsValue) {
        setError(confirmP, "Confirm your password again");
        return false;
    } else {
        confirmP.parentNode.classList.remove("error");
        confirmP.parentNode.classList.add("success");
        const small = confirmP.parentNode.querySelector("small");
        small.innerHTML = '';
        return true;
    }
}

function validateEmail() {
    const emailRegEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const emailValue = email.value.trim();
    if (emailValue == '') {
        setError(email, "Email is required");
        return false;
    } else if (!emailRegEx.test(emailValue)) {
        setError(email, "Email is not valid");
        return false;
    } else {
        email.parentNode.classList.remove("error");
        email.parentNode.classList.add("success");
        const small = email.parentNode.querySelector("small");
        small.innerHTML = '';
        return true;
    }
}

function validatePhone() {
    const telRegEx = /^(\+251|0)([\s-]?9\d{1}|(9\d{1}))[\s-]?\d{3}[\s-]?\d{4}$/; //(\+251|0)([\s-]?9\d{1}|(9\d{1}))[\s-]?\d{3}[\s-]?\d{4}$
    const inputsValue = phone.value.toString();
    if (inputsValue === '') {
        setError(phone, "Phone number is required");
        return false;
    } else if (inputsValue.length < 10) {
        console.log("too few chars");
        setError(phone, "Phone number can't be less than 10 characters");
        return false;
    } else if (inputsValue.length > 15) {
        console.log("too much chars");
        setError(phone, "Phone number can't be more than 15 characters");
        return false;
    } else if (!telRegEx.exec(inputsValue)) {
        console.log("pattern problem");
        setError(phone, "Please match the phone number pattern");
    } else {
        phone.parentNode.classList.remove("error");
        phone.parentNode.classList.add("success");
        const small = phone.parentNode.querySelector("small");
        small.innerHTML = '';
        return true;
    }
}

function eyeVisibility2() {
    var passwordIN = conf.value.trim();
    if (conf.value.trim() === '') {
        eye3.id = "off";
        eye4.setAttribute("id", "off");
    } else {
        eye3.id = "on";
        eye4.id = "off";
    }
}

function toggle2() {
    if (eye3.id == "on") {
        eye.id = "off";
        conf.type = "text";
    } else {
        eye3.id = "on";
        conf.type = "password";
    }

    if (eye4.id == "on") {
        eye4.id = "off";
        conf.type = "password";
    } else {
        eye4.id = "on";
        conf.type = "text";
    }
}

window.addEventListener("load", eyeVisibility2);
conf.onfocus = eyeVisibility2;
conf.onkeyup = eyeVisibility2;
eye3.addEventListener("click", toggle2);
eye4.addEventListener("click", toggle2);


function eyeVisibility() {
    var passwordIN = pass.value.trim();
    console.log(pass);
    console.log(pass.value);
    console.log(passwordIN === '');
    if (pass.value.trim() === '') {
        eye.id = "off";
        eye2.setAttribute("id", "off");
    } else {
        eye.id = "on";
        eye2.id = "off";
    }
}

window.addEventListener("load", eyeVisibility);
pass.onfocus = eyeVisibility;
pass.onkeyup = eyeVisibility;

eye.addEventListener("click", toggle);
eye2.addEventListener("click", toggle);

function toggle() {
    if (eye.id == "on") {
        eye.id = "off";
        pass.type = "text";
    } else {
        eye.id = "on";
        pass.type = "password";
    }

    if (eye2.id == "on") {
        eye2.id = "off";
        pass.type = "password";
    } else {
        eye2.id = "on";
        pass.type = "text";
    }
}