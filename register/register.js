const loginForm = document.getElementById("login");
const registerForm = document.getElementById("register");

const emailFormat = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

loginForm.onsubmit = function () {
    if (!loginForm.querySelector('[name="email"]').value.match(emailFormat)) {
        loginForm.querySelector(".emailError").textContent =
            "هذا البريد غير صالح";
        return false;
    } else {
        loginForm.querySelector(".emailError").textContent = "";
    }

    return true;
};

registerForm.onsubmit = function () {
    if (
        !registerForm.querySelector('[name="email"]').value.match(emailFormat)
    ) {
        registerForm.querySelector(".emailError").textContent =
            "هذا البريد غير صالح";
        return false;
    } else {
        registerForm.querySelector(".emailError").textContent = "";
    }

    if (
        registerForm.querySelector('[name="password"]').value !=
        registerForm.querySelector('[name="confirmPassword"]').value
    ) {
        registerForm.querySelector(".confirmPasswordError").textContent =
            "كلمات المرور غير متطابقتان";
        return false;
    } else {
        registerForm.querySelector(".confirmPasswordError").textContent = "";
    }

    return true;
};
