export function createNewUser() {
  const createNewUtilisateurBtn = document.getElementById("createNewUtilisateurBtn");
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

export function displayFormAjouterApprenant() {
  let ajouterApprenantBtn = document.getElementById("ajouterApprenantBtn");
  console.log(ajouterApprenantBtn);
  const contentUtilisateurDiv = document.getElementById(
    "contentUtilisateurDiv"
  );

  if (ajouterApprenantBtn) {
    ajouterApprenantBtn.addEventListener("click", () => {
      fetch("/ajouterApprenant")
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.text();
        })
        .then((data) => {
          contentUtilisateurDiv.innerHTML = data;
          createNewUser();
        })
        .catch((error) => {
          console.error("There was a problem with the fetch operation:", error);
        });
    });
  } else {
    console.error("ajouterPromotion button not found in the DOM");
  }
}

export function retourVersTousLesPromoDeApprenant() {
  const btnRetourVersTousLesPromoDeApprenant = document.getElementById(
    "btnRetourVersTousLesPromoDeApprenant"
  );

  console.log(btnRetourVersTousLesPromoDeApprenant);
  const body = document.body;

  btnRetourVersTousLesPromoDeApprenant.addEventListener("click", () => {
    fetch("/displayThisPromo")
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.text();
      })
      .then((data) => {
        body.innerHTML = "";
        body.innerHTML = data;
      })
      .catch((error) => {
        console.error("There was a problem with the fetch operation:", error);
      });
  });
}

export function confirmerMDP(){

  const createNewUtilisateurBtn = document.getElementById("createNewUtilisateurBtn");
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