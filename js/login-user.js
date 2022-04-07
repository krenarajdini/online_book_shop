// email validation

const emailElement = document.getElementById("email");
const emailErrorElement = document.getElementById("email-error");
let isEmailValid = false;
emailElement.onkeyup = function () {
  const email = emailElement.value;

  if (!email.match(/\S+@\S+\.\S+/)) {
    emailElement.classList.add("error-element");
    isEmailValid = false;
    emailErrorElement.innerText = "Invalid email id";
    emailErrorElement.classList.add("error-message");
  } else {
    emailElement.classList.remove("error-element");
    emailErrorElement.classList.remove("error-message");
    emailErrorElement.innerText = "";

    isEmailValid = true;
  }
};
