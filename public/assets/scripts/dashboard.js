// import * as service from "./script.js";

document.getElementById("deconnexionBtn").addEventListener("click", () => {
  const body = document.body;
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
    });
});

document.getElementById("ajouterPromotionBtn").addEventListener("click", () => {
  let promotionsDiv = document.getElementById("promotionsDiv");
  let ajouterPromoDiv = document.getElementById("ajouterPromoDiv");
  promotionsDiv.classList.add("d-none");
  ajouterPromoDiv.classList.remove("d-none");
});

document
  .getElementById("btnRetourVersTousLesPromo")
  .addEventListener("click", () => {
    let promotionsDiv = document.getElementById("promotionsDiv");
    let ajouterPromoDiv = document.getElementById("ajouterPromoDiv");
    promotionsDiv.classList.remove("d-none");
    ajouterPromoDiv.classList.add("d-none");
  });

document.getElementById("displayThisPromoBtn").addEventListener("click", () => {
  const bodyDashboard = document.getElementById("bodyDashboard");

  fetch("/displayThisPromo")
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.text();
    })
    .then((data) => {
      bodyDashboard.innerHTML = "";
      bodyDashboard.innerHTML = data;
    });
});

document
  .getElementById("btnRetourVersTousLesPromo1")
  .addEventListener("click", () => {
    const bodyDashboard = document.getElementById("bodyDashboard");

    fetch("/dashboard")
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.text();
      })
      .then((data) => {
        bodyDashboard.innerHTML = "";
        bodyDashboard.innerHTML = data;
      })
      .catch((error) => {
        console.error("There was a problem with the fetch operation:", error);
      });
  });
