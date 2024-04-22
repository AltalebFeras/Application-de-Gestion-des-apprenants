 


 function reappendScript() {
    const main = document.getElementById("mainUtilisateurScripts1");
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

 document.getElementById('ajouterRetardBtn').addEventListener('click', addLate)

 function addLate(event){

    event.preventDefault();

    const tableUserAbsentDiv = document.getElementById("tableUserAbsentDiv");

  const utilisateurSelect = document.getElementById("utilisateurSelect");
  const coursSelect = document.getElementById("coursSelect");

    const utilisateurSelectValue = utilisateurSelect.value;
    const coursSelecttValue = coursSelect.value;

    const url = "/addAbsents";

    const utilisateur = {
        ID_Utilisateur: utilisateurSelectValue,
        ID_Cours: coursSelecttValue,
 
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
        tableUserAbsentDiv.innerHTML = "";
        tableUserAbsentDiv.innerHTML = result;
        reappendScript();
      });
  }
