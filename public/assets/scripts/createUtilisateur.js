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

document
  .getElementById("createNewUtilisateurBtn")
  .addEventListener("click", (event) => {
    event.preventDefault();

    const contentUtilisateurDiv = document.getElementById("contentUtilisateurDiv");
    const inputNom = document.getElementById("Nom");
    const inputPrenom = document.getElementById("Prenom");
    const inputEmail = document.getElementById("Email");

    let contentPromotion = document.getElementById("contentPromotion");
    let ajouterApprenantDiv = document.getElementById("ajouterApprenantDiv");

    const inputNomValue = inputNom.value;
    const inputPrenomtValue = inputPrenom.value;
    const inputEmailValue = inputEmail.value;

    const url = "/ajouterApprenant";

    const utilisateur = {
      Nom: inputNomValue,
      Prenom: inputPrenomtValue,
      Email: inputEmailValue,
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
