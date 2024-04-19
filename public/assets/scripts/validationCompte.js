// function validationForm() {
//   var password1 = document.getElementById("Mot_De_Passe_Choisi").value;
//   var password2 = document.getElementById("Mot_De_Passe_Choisi_Confirme").value;

//   if (password1 === "" || password2 === "") {
//     document.getElementById("Mot_De_Passe_ChoisiError").innerHTML =
//       "Les deux champs de mot de passe sont requis.";
//     document.getElementById("Mot_De_Passe_Choisi_ConfirmeError").innerHTML =
//       "Les deux champs de mot de passe sont requis.";
//     return;
//   }

//   if (password1 !== password2) {
//     document.getElementById("Mot_De_Passe_Choisi_ConfirmeError").innerHTML =
//       "Les deux mots de passe ne correspondent pas.";
//     return;
//   }

   

 
// }
function getHashedEmailFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    const Email = urlParams.get('Email');
    return Email;
}


document.getElementById("btnConfirmPassword").addEventListener("click", handleForm);

function handleForm(event) {
    event.preventDefault();

    // if (!validationForm()) {
    //     return;
    // }
    const body = document.body
    const inputPassword = document.getElementById("Mot_De_Passe_Choisi").value;
    const Email = getHashedEmailFromURL();

    if (!Email) {
        console.error("Hashed email not found in URL.");
        return;
    }

    const user = {
        Mot_De_Passe_Choisi: inputPassword,
        Email: Email,
    };

    fetch("/validationCompteGET", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(user),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        return response.json();
    })
    .then((response) => {
        return response.text();
      })
      .then((result) => {
        body.innerHTML = "";
        body.innerHTML = result;
        // reappendScript();

       
      });
   
}    



document.getElementById('connexionBtn').addEventListener('click', homePage)

function homePage(){
    const body = document.body

  const url = "/";
  fetch(url)
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
      console.error(
        "There has been a problem with your fetch operation:",
        error
      );
    });

}