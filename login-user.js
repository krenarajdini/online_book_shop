//email validation

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

//Password validation
const passElement = document.getElementById("pswd");
const confirmPassElement = document.getElementById("confirm-pswd");
const passErrorMessageElement = document.getElementById("pass-error-message");
let pass;
let confirmPass;

passElement.onkeyup = function () {
  pass = passElement.value;
  confirmPass = confirmPassElement.value;

  if (
    pass == confirmPass &&
    !pass.match("/^(?=.*d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/")
  ) {
    passElement.classList.remove("error-element");
    confirmPassElement.classList.remove("error-element");
    passErrorMessageElement.innerText = "";
    passErrorMessageElement.classList.remove("error-message");
  } else {
    passElement.classList.add("error-element");
    confirmPassElement.classList.add("error-element");
    passErrorMessageElement.innerText = "Passwords must match";
    passErrorMessageElement.classList.add("error-message");
  }
};
