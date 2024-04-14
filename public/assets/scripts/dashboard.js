import * as servicePromo from "./utilisateur.js";

export function deconnexion() {
  const body = document.body;
  const deconnexionBtn = document.getElementById("deconnexionBtn");

  if (deconnexionBtn) {
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
          body.innerHTML = result;
        })
        .catch((error) => {
          console.log("AJAX request failed: ", error);
        });
    });
  } else {
    console.error("deconnexionBtn not found in the DOM");
  }
}

export function displayFormPromotion() {
  let contentPromotion = document.getElementById("contentPromotion");
  let ajouterPromotion = document.getElementById("ajouterPromotion");

  if (ajouterPromotion) {
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
          createNewPromo();
          retourVersTousLesPromo();
        })
        .catch((error) => {
          console.error("There was a problem with the fetch operation:", error);
        });
    });
  } else {
    console.error("ajouterPromotion button not found in the DOM");
  }
}

export function createNewPromo() {
  const createNewPromoBtn = document.getElementById("createNewPromoBtn");
  const body = document.body;

  if (createNewPromoBtn) {
    createNewPromoBtn.addEventListener("click", (event) => {
      event.preventDefault();

      const inputPromoNom = document.getElementById("promoNom");
      const inputDateDebut = document.getElementById("dateDebut");
      const inputDateFin = document.getElementById("dateFin");
      const inputPlaceDispo = document.getElementById("placeDispo");

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
          body.innerHTML = result;
        });
    });
  } else {
    console.error("createNewPromoBtn not found in the DOM");
  }
}

export function displayThisPromo() {
  let displayThisPromoBtn = document.getElementById("displayThisPromoBtn");
  const body = document.body;

  if (displayThisPromoBtn) {
    displayThisPromoBtn.addEventListener("click", () => {
      fetch("/displayThisPromo")
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.text();
        })
        .then((data) => {
          body.innerHTML = data;
          servicePromo.displayFormAjouterApprenant();
          servicePromo.retourVersTousLesPromoDeApprenant();
        })
        .catch((error) => {
          console.error("There was a problem with the fetch operation:", error);
        });
    });
  } else {
    console.error("displayThisPromoBtn not found in the DOM");
  }
}

export function retourVersTousLesPromo() {
  const btnRetourVersTousLesPromo = document.getElementById(
    "btnRetourVersTousLesPromo"
  );
  const body = document.body;

  if (btnRetourVersTousLesPromo) {
    btnRetourVersTousLesPromo.addEventListener("click", () => {
      fetch("/dashboard")
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.text();
        })
        .then((data) => {
          body.innerHTML = "";
          body.innerHTML = data;
          displayFormPromotion();
          deconnexion();
          displayThisPromo();
        })
        .catch((error) => {
          console.error("There was a problem with the fetch operation:", error);
        });
    });
  } else {
    console.error("btnRetourVersTousLesPromo not found in the DOM");
  }
}

export function retourVersTousLesPromo1() {
  const btnRetourVersTousLesPromo1 = document.getElementById(
    "btnRetourVersTousLesPromo1"
  );
  const body = document.body;

  btnRetourVersTousLesPromo1.addEventListener("click", () => {
    fetch("/dashboard")
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.text();
      })
      .then((data) => {
        body.innerHTML = "";
        body.innerHTML = data;
        displayFormPromotion();
        deconnexion();
        createNewPromo();
        retourVersTousLesPromo();
        displayThisPromo();
      })
      .catch((error) => {
        console.error("There was a problem with the fetch operation:", error);
      });
  });
}
