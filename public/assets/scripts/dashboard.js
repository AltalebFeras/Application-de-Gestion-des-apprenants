import * as servicePromo from "./promo.js";


export function deconnexion() {
  const body = document.body;
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
  }); // Added closing parenthesis for addEventListener
  // Added closing parenthesis for DOMContentLoaded event listener
}

export function displayFormPromotion() {
  let contentPromotion = document.getElementById("contentPromotion");
  let ajouterPromotion = document.getElementById("ajouterPromotion");

  ajouterPromotion.addEventListener("click", () => {
    fetch("/ajouterPromotion")
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.text();
      })
      .then((data) => {
        contentPromotion.innerHTML = data;
        servicePromo.retourVersTousLesPromo();
        
      })
      .catch((error) => {
        console.error("There was a problem with the fetch operation:", error);
      });
  });
}
