

document.getElementById("ajouterApprenantBtn").addEventListener("click", () => {
  let contentPromotion = document.getElementById("contentPromotion");
  let ajouterApprenantDiv = document.getElementById("ajouterApprenantDiv");
  contentPromotion.classList.add("d-none");
  ajouterApprenantDiv.classList.remove("d-none");
});

document
  .getElementById("btnRetourVersTousLesPromoDeApprenant")
  .addEventListener("click", () => {
    let contentPromotion = document.getElementById("contentPromotion");
    let ajouterApprenantDiv = document.getElementById("ajouterApprenantDiv");
    contentPromotion.classList.remove("d-none");
    ajouterApprenantDiv.classList.add("d-none");
  });


  

function confirmerMDP() {
  const createNewUtilisateurBtn = document.getElementById(
    "createNewUtilisateurBtn"
  );
  console.log(createNewUtilisateurBtn);
  const body = document.body;

  if (createNewUtilisateurBtn) {
    createNewUtilisateurBtn.addEventListener("click", (event) => {
      event.preventDefault();

      const inputNom = document.getElementById("Nom");
      const inputPrenom = document.getElementById("Prenom");
      const inputEmail = document.getElementById("Email");

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
          body.innerHTML = result;
        });
    });
  } else {
    console.error("createNewUtilisateurBtn not found in the DOM");
  }
}
