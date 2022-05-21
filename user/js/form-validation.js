const submitBtn = document.querySelector("input[id='submit']");
const username = document.getElementById("username");
const password = document.getElementById("password");
const form = document.getElementById("form");


submitBtn.onclick = () => {
    validateUsername();
    validatePassword();
    if (validatePassword() && validateUsername()) {
        return true;
    } else {
        return false;
    }
};
const small = document.querySelectorAll("small");

function setError(elme, message) {
    const div = elme.parentNode;
    const small = div.querySelector("small");
    small.innerText = message;
    div.classList.remove("success");
    div.classList.add("error");
}

function validateUsername() {
    let usernameRegEx = /(^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$)/;
    const inputsValue = username.value.trim();
    if (inputsValue === '') {
        setError(username, "user name is required");
        return false;
    } else if (inputsValue.length < 6) {
        setError(username, "Username must be more than 6 characters");
        return false;
    } else if (inputsValue.length > 30) {
        setError(username, "Username can't be more than 30 characters");
        return false;
    } // usernameRegEx = /^([a-zA-z])\w{6,30}$/;
    else if (!usernameRegEx.test(inputsValue)) {
        setError(username, "Username or email doesn't match the patter");
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



const eye = document.querySelector(".fa-eye");
const eye2 = document.querySelector(".fa-eye-slash");
const pass = document.querySelector("input[id='password']");
//const conf = document.querySelector("input[id='confirm']");
const passInputs = document.querySelectorAll("input[type='password']");
const eyes = document.querySelectorAll(".fa-eye");
const eyeSlashes = document.querySelectorAll(".fa-eye-slash");


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