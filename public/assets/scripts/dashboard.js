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
        createNewPromo();

        
      })
      .catch((error) => {
        console.error("There was a problem with the fetch operation:", error);
      });
  });
}

export function createNewPromo() {
  const createNewPromoBtn = document.getElementById("createNewPromoBtn");
  console.log(createNewPromoBtn);
  const body = document.body;

  const inputPromoNom = document.getElementById("promoNom");
  const inputDateDebut = document.getElementById("dateDebut");
  const inputDateFin = document.getElementById("dateFin");
  const inputPlaceDispo = document.getElementById("placeDispo");

 
    createNewPromoBtn.addEventListener("click",(event)=> {
    event.preventDefault();

    const inputPromoNomValue = inputPromoNom.value;
    const inputDateDebutValue = inputDateDebut.value;
    const inputDateFinValue = inputDateFin.value;
    const inputPlaceDispoValue = inputPlaceDispo.value;

    const url = "/ajouterPromotion";

    const promo = {
      promoNom: inputPromoNomValue,
      dateDebut: inputDateDebutValue,
      dateFin: inputDateFinValue,
      placeDispo: inputPlaceDispoValue,
    };

    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(promo),
    })
      .then((response) => {
        return response.text();
      })
      .then((result) => {
        body.innerHTML = "";
        body.innerHTML = result;
      });
  })
}
