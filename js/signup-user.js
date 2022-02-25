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
      numberErrorElement.innerText = "";
      numberErrorElement.classList.remove("error-message");
    }
  }
};

areaNumberElement.onkeyup = function () {
  let areaNumber = areaNumberElement.value;

  if (!areaNumber.match(/^[0-9]+$/)) {
    areaNumberElement.classList.add("error-element");
    isAreaCodeValid = false;
    numberErrorElement.innerText = "Must contain only numbers";
    numberErrorElement.classList.add("error-message");
  } else {
    areaNumberElement.classList.remove("error-element");
    isAreaCodeValid = true;
    if (isAreaCodeValid && isCountryCodeValid && isPhoneValid) {
      numberErrorElement.innerText = "";
      numberErrorElement.classList.remove("error-message");
    }
  }
};

phoneNumberElement.onkeyup = function () {
  let phoneNumber = phoneNumberElement.value;
  if (!phoneNumber.match(/^[0-9]+$/)) {
    phoneNumberElement.classList.add("error-element");
    isPhoneValid = false;
    numberErrorElement.innerText = "Must contain only numbers";
    numberErrorElement.classList.add("error-message");
  } else {
    phoneNumberElement.classList.remove("error-element");
    isPhoneValid = true;
    if (isAreaCodeValid && isCountryCodeValid && isPhoneValid) {
      numberErrorElement.innerText = "";
      numberErrorElement.classList.remove("error-message");
    }
  }
};

//Form validation onSubmit

const signupBtnElement = document.getElementById("signup-btn");

signupBtnElement.onclick = function (e) {
  if (!isUsernameValid) {
    e.preventDefault();
    console.log("error");
  }
};
