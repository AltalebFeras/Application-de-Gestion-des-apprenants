export function appendScripts() {
  const main = document.getElementById("main");
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



document.getElementById("submissionButton").addEventListener("click", handleFormSubmission);

function handleFormSubmission(event) {
  event.preventDefault();

  const body = document.getElementById("body");
  const inputEmail = document.getElementById("Email");
  const inputMot_De_Passe = document.getElementById("Mot_De_Passe");
  const inputEmailValue = inputEmail.value;
  const inputMot_De_PasseValue = inputMot_De_Passe.value;

  const url = "/";
  const user = {
    Email: inputEmailValue,
    Mot_De_Passe: inputMot_De_PasseValue,
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
      body.innerHTML = "";
      body.innerHTML = result;
      appendScripts();
    });
}

