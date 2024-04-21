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





  
document
  .getElementById("matinValiderLeCodeApprenant")
  .addEventListener("click", handleFormSubmission);

function handleFormSubmission(event) {
  event.preventDefault();

  const singatureStatusDiv = document.getElementById("singatureStatusDiv");
  const inputCode_Aleatoire = document.getElementById("Code_Aleatoire");
  const inputCode_AleatoireValue = inputCode_Aleatoire.value;

  const url = "/codeValidationMatin";
  const user = {
    Code_Aleatoire: inputCode_AleatoireValue,
  };

  fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(user),
  })
    .then((response) => {
      return response.text();
    })
    .then((result) => {
      singatureStatusDiv.innerHTML = "";

      let divElement = document.createElement("div");
      divElement.classList.add("d-flex", "flex-row-reverse");

      let buttonElement = document.createElement("button");
      buttonElement.type = "button";
      buttonElement.classList.add(
        "my-3",
        "mx-2",
        "d-flex",
        "justify-content-end",
        "btn",
        "btn-secondary"
      );
      buttonElement.textContent = "Signature recueillie";
      divElement.appendChild(buttonElement);
      singatureStatusDiv.appendChild(divElement);

    });
}
