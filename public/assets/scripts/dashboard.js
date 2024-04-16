// import * as service from "./script.js";

function appendNewScripts() {
  const mainPromo = document.getElementById("mainPromo");
  let scripts = mainPromo.querySelectorAll("script");

  for (let i = 0; i < scripts.length; i++) {
    if (!scripts[i].innerText) {
      let script = document.createElement("script");
      script.src = scripts[i].src;

      mainPromo.removeChild(scripts[i]);
      mainPromo.appendChild(script);
    }
  }
}

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

  function appendNewScriptsUtilisateur() {
    const mainUtilisateurScripts = document.getElementById("mainUtilisateurScripts");
    let scripts = mainUtilisateurScripts.querySelectorAll("script");
  
    for (let i = 0; i < scripts.length; i++) {
      if (!scripts[i].innerText) {
        let script = document.createElement("script");
        script.src = scripts[i].src;
  
        mainUtilisateurScripts.removeChild(scripts[i]);
        mainUtilisateurScripts.appendChild(script);
      }
    }
  }
  
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
          appendNewScriptsUtilisateur()
        });
    });