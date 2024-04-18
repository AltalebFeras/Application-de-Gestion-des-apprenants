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

function validatePromoForm() {
  var promoNom = document.getElementById("promoNom").value;
  var dateDebut = document.getElementById("dateDebut").value;
  var dateFin = document.getElementById("dateFin").value;
  var placeDispo = document.getElementById("placeDispo").value;

  var promoNomError = document.getElementById("promoNomError");
  var dateDebutError = document.getElementById("dateDebutError");
  var dateFinError = document.getElementById("dateFinError");
  var placeDispoError = document.getElementById("placeDispoError");

  promoNomError.textContent = "";
  dateDebutError.textContent = "";
  dateFinError.textContent = "";
  placeDispoError.textContent = "";

  var isValid = true;

  if (promoNom === "") {
    promoNomError.textContent = "Veuillez saisir un nom de promotion.";
    isValid = false;
  }

  if (dateDebut === "") {
    dateDebutError.textContent = "Veuillez sélectionner une date de début.";
    isValid = false;
  }

  if (dateFin === "") {
    dateFinError.textContent = "Veuillez sélectionner une date de fin.";
    isValid = false;
  }

  if (placeDispo === "") {
    placeDispoError.textContent = "Veuillez saisir le nombre de places disponibles.";
    isValid = false;
  }

  return isValid;
}


document
  .getElementById("createNewPromoBtn")
  .addEventListener("click", (event) => {
    event.preventDefault();

    if (!validatePromoForm()) {
      return;
    }
    const tablePromoDiv = document.getElementById("tablePromoDiv");
    const promoForm = document.getElementById('promoForm')
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

        inputPromoNomValue = "";
        inputDateDebutValue = "";
        inputPlaceDispoValue = "";
        inputDateFinValue = "";
        promoForm.reset();
      });
  });
