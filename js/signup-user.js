//Username validation
const usernameElement = document.getElementById("username");
const usernameErrorElement = document.getElementById("username-error");
let isUsernameValid = false;
usernameElement.onkeyup = function () {
  const username = usernameElement.value;

  if (!username.match(/^[a-zA-Z]+$/)) {
    usernameElement.classList.add("error-element");
    isUsernameValid = false;
    usernameErrorElement.innerText = "Username must be alpha";
    usernameErrorElement.classList.add("error-message");
  } else {
    usernameElement.classList.remove("error-element");
    usernameErrorElement.classList.remove("error-message");
    usernameErrorElement.innerText = "";

    isUsernameValid = true;
  }
};

//Phone number validation
const countryNumberElement = document.getElementById("country-number");
const areaNumberElement = document.getElementById("area-number");
const phoneNumberElement = document.getElementById("phone-number");

const numberErrorElement = document.getElementById("number-error");

let isCountryCodeValid = false;
let isAreaCodeValid = false;
let isPhoneValid = false;

let isNumberValid = false;

countryNumberElement.onkeyup = function () {
  let countryNumber = countryNumberElement.value;
  if (!countryNumber.match(/^[0-9]+$/)) {
    countryNumberElement.classList.add("error-element");
    isCountryCodeValid = false;
    numberErrorElement.innerText = "Must contain only numbers";
    numberErrorElement.classList.add("error-message");
  } else {
    countryNumberElement.classList.remove("error-element");
    isCountryCodeValid = true;
    if (isAreaCodeValid && isCountryCodeValid && isPhoneValid) {
      numberErrorElement.classList.remove("error-message");
      numberErrorElement.innerText = "";
    }
  }
};

areaNumberElement.onkeyup = function () {
  let areaNumber = areaNumberElement.value;

  if (!areaNumber.match(/^[0-9]+$/) || areaNumber.length != 2) {
    areaNumberElement.classList.add("error-element");
    isAreaCodeValid = false;
    numberErrorElement.innerText = "Must contain only numbers";
    numberErrorElement.classList.add("error-message");
  } else {
    areaNumberElement.classList.remove("error-element");
    isAreaCodeValid = true;
    if (isAreaCodeValid && isCountryCodeValid && isPhoneValid) {
      numberErrorElement.classList.remove("error-message");
      numberErrorElement.innerText = "";
    }
  }
};

phoneNumberElement.onkeyup = function () {
  let phoneNumber = phoneNumberElement.value;
  if (!phoneNumber.match(/^[0-9]+$/) || phoneNumber.length != 7) {
    phoneNumberElement.classList.add("error-element");
    isPhoneValid = false;
    numberErrorElement.innerText = "Must contain only numbers";
    numberErrorElement.classList.add("error-message");
  } else {
    phoneNumberElement.classList.remove("error-element");
    isPhoneValid = true;
    if (isAreaCodeValid && isCountryCodeValid && isPhoneValid) {
      numberErrorElement.classList.remove("error-message");
      numberErrorElement.innerText = "";
    }
  }
};

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

confirmPassElement.onkeyup = function () {
  pass = passElement.value;
  confirmPass = confirmPassElement.value;

  if (
    pass == confirmPass &&
    !confirmPass.match("/^(?=.*d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/")
  ) {
    confirmPassElement.classList.remove("error-element");
    passElement.classList.remove("error-element");
    passErrorMessageElement.innerText = "";
    passErrorMessageElement.classList.remove("error-message");
  } else {
    confirmPassElement.classList.add("error-element");
    passElement.classList.add("error-element");
    passErrorMessageElement.innerText = "Passwords must match";
    passErrorMessageElement.classList.add("error-message");
  }
};

//Form validation onSubmit
