import * as serviceNavDec from "./dashboard.js";

const submissionButton = document.getElementById("submissionButton");
const body = document.getElementById("body");

const inputEmail = document.getElementById("Email");
const inputPassword = document.getElementById("Mot_De_Passe");

if (submissionButton) {
  submissionButton.addEventListener("click", handleFormSubmission);
}

function handleFormSubmission(event) {
  event.preventDefault();

  const inputEmailValue = inputEmail.value;
  const inputPasswordValue = inputPassword.value;

  const url = "/";
  const user = {
    email: inputEmailValue,
    password: inputPasswordValue,
  };

  fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(user),
  })
    .then((response) => {
      return response.text();
    })
    .then((result) => {
      body.innerHTML = "";
      body.innerHTML = result;
      serviceNavDec.displayFormPromotion();
      serviceNavDec.deconnexion();
    });
};

 
  

const deconnexionBtn = document.getElementById("deconnexionBtn");
deconnexionBtn.addEventListener("click", () => {
    fetch("/deconnexion")
      .then((response) => {
        if (response.ok) {
          return response.text();
        } else {
          throw new Error("Logout failed");
        }
      })
      .then((result) => {
        body.innerHTML = "";
        body.innerHTML = result;
      })
      .catch((error) => {
        console.log("AJAX request failed: ", error);
      });
  });
 