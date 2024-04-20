function reappendScript() {
  const main = document.getElementById("mainUtilisateurScripts");
  let scripts = main.querySelectorAll("script");

  for (let i = 0; i < scripts.length; i++) {
    if (!scripts[i].innerText) {
      let script = document.createElement("script");
      script.src = scripts[i].src;

      main.removeChild(scripts[i]);
      main.appendChild(script);
    }
  }
}

function validateForm() {
  let nom = document.getElementById("Nom").value;
  let prenom = document.getElementById("Prenom").value;
  let email = document.getElementById("Email").value;

  let nomError = document.getElementById("nomError");
  let prenomError = document.getElementById("prenomError");
  let emailError = document.getElementById("emailError");

  nomError.textContent = "";
  prenomError.textContent = "";
  emailError.textContent = "";

  let isValid = true;

  if (nom === "") {
    nomError.textContent = "Veuillez saisir un nom.";
    isValid = false;
  }

  if (prenom === "") {
    prenomError.textContent = "Veuillez saisir un prénom.";
    isValid = false;
  }

  if (email === "") {
    emailError.textContent = "Veuillez saisir un adresse email.";
    isValid = false;
  }

  return isValid;
}

document
  .getElementById("createNewUtilisateurBtn")
  .addEventListener("click", (event) => {
    event.preventDefault();

    if (!validateForm()) {
      return;
    }

    const tableUserDiv = document.getElementById("tableUserDiv");
    const inputNom = document.getElementById("Nom");
    const inputPrenom = document.getElementById("Prenom");
    const inputEmail = document.getElementById("Email");
    const inputRole = document.getElementById("ID_Role");
    const ID_Promo = document.getElementById("ID_Promo");

    let ajouterApprenantDiv = document.getElementById("ajouterApprenantDiv");

    const inputNomValue = inputNom.value;
    const inputPrenomtValue = inputPrenom.value;
    const inputEmailValue = inputEmail.value;
    const inputRoleValue = inputRole.value;
    const ID_PromoValue = ID_Promo.value;

    const url = "/ajouterApprenant";

    const utilisateur = {
      Nom: inputNomValue,
      Prenom: inputPrenomtValue,
      Email: inputEmailValue,
      ID_Role: inputRoleValue,
      ID_Promo : ID_PromoValue
    };

    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(utilisateur),
    })
      .then((response) => {
        return response.text();
      })
      .then((result) => {
        ajouterApprenantDiv.classList.add("d-none");
        tableUserDiv.classList.remove("d-none");
        tableUserDiv.innerHTML = "";
        tableUserDiv.innerHTML = result;
        reappendScript();
      });
  });
