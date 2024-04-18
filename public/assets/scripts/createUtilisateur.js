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
  var nom = document.getElementById("Nom").value;
  var prenom = document.getElementById("Prenom").value;
  var email = document.getElementById("Email").value;

  var nomError = document.getElementById("nomError");
  var prenomError = document.getElementById("prenomError");
  var emailError = document.getElementById("emailError");

  nomError.textContent = "";
  prenomError.textContent = "";
  emailError.textContent = "";

  var isValid = true;

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

    const contentUtilisateurDiv = document.getElementById(
      "contentUtilisateurDiv"
    );
    const inputNom = document.getElementById("Nom");
    const inputPrenom = document.getElementById("Prenom");
    const inputEmail = document.getElementById("Email");
    const inputRole = document.getElementById("ID_Role");

    let contentPromotion = document.getElementById("contentPromotion");
    let ajouterApprenantDiv = document.getElementById("ajouterApprenantDiv");

    const inputNomValue = inputNom.value;
    const inputPrenomtValue = inputPrenom.value;
    const inputEmailValue = inputEmail.value;
    const inputRoleValue = inputRole.value;

    const url = "/ajouterApprenant";

    const utilisateur = {
      Nom: inputNomValue,
      Prenom: inputPrenomtValue,
      Email: inputEmailValue,
      ID_Role: inputRoleValue,
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
        contentPromotion.classList.add("d-none");
        contentUtilisateurDiv.innerHTML = "";
        contentUtilisateurDiv.innerHTML = result;
        ajouterApprenantDiv.classList.remove("d-none");
        reappendScript();

       
      });
  });
