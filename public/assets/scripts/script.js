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
    });
}

const logoutBtn = document.getElementById("logoutBtn");
logoutBtn.addEventListener("click", logoutUser);
function logoutUser() {
  const url = "/deconnexion"; 
  fetch(url, {
      method: "POST",
      headers: {
          "Content-Type": "application/json",
      },
  })
  .then((response) => {
      return response.json();
  })
  .then((result) => {
      if (result.success) {
          window.location.href = HOME_URL;
      } else {
          console.log("Logout failed");
      }
  })
  .catch((error) => {
      console.log("AJAX request failed: ", error);
  });
}

