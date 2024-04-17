function appendNewScripts() {
  const mainTableScripts = document.getElementById("mainTableScripts");
  let scripts = mainTableScripts.querySelectorAll("script");

  for (let i = 0; i < scripts.length; i++) {
    if (!scripts[i].innerText) {
      let script = document.createElement("script");
      script.src = scripts[i].src;

      mainTableScripts.removeChild(scripts[i]);
      mainTableScripts.appendChild(script);
    }
  }
}
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
document
  .getElementById("createNewPromoBtn")
  .addEventListener("click", (event) => {
    event.preventDefault();
    const tablePromoDiv = document.getElementById("tablePromoDiv");
    // let promotionsDiv = document.getElementById('promotionsDiv');
    // let ajouterPromoDiv = document.getElementById('ajouterPromoDiv');

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
        promotionsDiv.classList.remove("d-none");
        tablePromoDiv.innerHTML = "";
        tablePromoDiv.innerHTML = result;
        ajouterPromoDiv.classList.add("d-none");
        appendNewScripts();
      });
  });


  

  function attachEventListeners() {
    let boutonsVoirPromo = document.querySelectorAll(".voir-btn");
    boutonsVoirPromo.forEach(function (boutonVoirThisPromo) {
      boutonVoirThisPromo.addEventListener("click", function() {
        let idDePromoAVoir = this.getAttribute("data-promo-id");
        voirThisPromo(idDePromoAVoir);
      });
    });
  }




function voirThisPromo(idDePromoAVoir) {

    const bodyDashboard = document.getElementById("bodyDashboard");
 
  const url = "/displayThisPromo";
  fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ idDePromoAVoir: idDePromoAVoir }),
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.text();
  })
  .then((data) => {
    bodyDashboard.innerHTML = "";
    bodyDashboard.innerHTML = data;
    appendNewScriptsUtilisateur()
    attachEventListeners();
  })
  .catch(error => {
    console.error('There has been a problem with your fetch operation:', error);
  });
}

attachEventListeners();



