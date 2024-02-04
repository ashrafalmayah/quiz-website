const emailInput = document.getElementById("email");
const submitBtn = document.getElementById("submit");
const password = document.getElementById("password");
const confirmPassword = document.getElementById("confirmPassword");
const emailFormat = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

submitBtn.onclick = function () {
    if(!emailInput.value.match(emailFormat)){
        alert("Email is not valid!");
        return false;
    }
    if(password.value != confirmPassword.value){
        alert("Password must match!");
        return false;
    }

    return true;
};
