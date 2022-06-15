const inputPass = document.querySelector(".form-pw");

const eyeOpen = document.querySelector(".eye-open");

const eyeClose = document.querySelector(".eye-close");

eyeOpen.addEventListener("click", function () {
    eyeOpen.classList.add("hidden");
    eyeClose.classList.remove("hidden");
    inputPass.setAttribute("type", "password");
});

eyeClose.addEventListener("click", function () {
    eyeOpen.classList.remove("hidden");
    eyeClose.classList.add("hidden");
    inputPass.setAttribute("type", "text");
});
