const email = document.querySelector("#username");
const btn = document.querySelector("#submit");
const searchEmail = JSON.parse(localStorage.getItem("Members")) ? JSON.parse(localStorage.getItem("Members")) : [];
console.log(searchEmail);
console.log(email, btn);
btn.onclick = () => {
    validateEmail();
    if (validateEmail()) {
        return true;
    }
    return false;
}

function setError(elme, message) {
    const div = elme.parentNode;
    console.log(div);
    const small = div.querySelector("small");
    console.log(small);
    small.innerText = message;
    div.classList.remove("success");
    div.classList.add("error");
}

function validateEmail() {
    const emailRegEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const emailValue = email.value.trim();
    if (emailValue == '') {
        setError(email, "Email is required");
    } else if (!emailRegEx.test(emailValue)) {
        setError(email, "Email is not valid");
    } else {
        email.parentNode.classList.remove("error");
        email.parentNode.classList.add("success");
        const small = email.parentNode.querySelector("small");
        small.innerHTML = '';
        return true;
    }
}