
  
  
  
  function createSignatureButton() {
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
    
    let singatureMatinStatusDiv = document.getElementById("singatureMatinStatusDiv"); // Replace "singatureMatinStatusDiv" with the actual ID of the div where you want to append the created elements
    singatureMatinStatusDiv.appendChild(divElement);
  }
  
   

  






  function createForm() {
    let singatureMatinStatusDiv = document.getElementById(
      "singatureMatinStatusDiv"
    );
  
    let formElement = document.createElement("form");
    formElement.classList.add("d-flex", "flex-column", "my-3", "mx-2");
  
    let inputElement = document.createElement("input");
    inputElement.type = "number";
    inputElement.classList.add("my-3", "mx-2");
    inputElement.id = "Code_Aleatoire";
    inputElement.name = "Code_Aleatoire";
    inputElement.placeholder = ".....";
  
    let divElement = document.createElement("div");
    divElement.classList.add("d-flex", "flex-row-reverse");
  
    let buttonElement = document.createElement("button");
    buttonElement.type = "submit";
    buttonElement.id = "matinValiderLeCodeApprenant";
    buttonElement.classList.add(
      "my-3",
      "mx-2",
      "d-flex",
      "justify-content-end",
      "btn",
      "btn-primary"
    );
    buttonElement.textContent = "Valider présence";
  
    divElement.appendChild(buttonElement);
    formElement.appendChild(inputElement);
    formElement.appendChild(divElement);
    singatureMatinStatusDiv.appendChild(formElement);
  
    // Append the script element
    let scriptElement = document.createElement("script");
    scriptElement.src = "assets/scripts/dashboard.js";
    scriptElement.type = "module";
    document.body.appendChild(scriptElement);
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  document
    .getElementById("matinValiderLeCodeApprenant")
    .addEventListener("click", handleFormSubmission);
  
  function handleFormSubmission(event) {
    event.preventDefault();
  
    const singatureMatinStatusDiv = document.getElementById(
      "singatureMatinStatusDiv"
    );
    const messageError = document.getElementById("messageError");
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
        singatureMatinStatusDiv.innerHTML = "";
  
        const response = JSON.parse(result);
  
        if (response.error) {
          messageError.textContent = response.error;
  
          createForm();
        }
        if (response.succes) {
          messageError.textContent = "Votre code est valide";
          messageError.classList.remove("text-danger");
          messageError.classList.add("text-success");
          singatureMatinStatusDiv.innerHTML = response.succes;
        }
      });
  }
  