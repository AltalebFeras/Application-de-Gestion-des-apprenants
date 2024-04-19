function appendNewScriptsUtilisateur() {
    const mainUtilisateurScripts = document.getElementById("mainUtilisateurScripts");
    let scripts = mainUtilisateurScripts.querySelectorAll("script");
  
    for (let i = 0; i < scripts.length; i++) {
      if (!scripts[i].innerText) {
        let script = document.createElement("script");
        script.src = scripts[i].src;
  
        mainUtilisateurScripts.removeChild(scripts[i]);
        mainUtilisateurScripts.appendChild(script);
      }
    }
  }
  function appendNewScriptsUtilisateur1() {
    const mainUtilisateurScripts1 = document.getElementById("mainUtilisateurScripts1");
    let scripts = mainUtilisateurScripts1.querySelectorAll("script");
  
    for (let i = 0; i < scripts.length; i++) {
      if (!scripts[i].innerText) {
        let script = document.createElement("script");
        script.src = scripts[i].src;
  
        mainUtilisateurScripts1.removeChild(scripts[i]);
        mainUtilisateurScripts1.appendChild(script);
      }
    }
  }
  function attachEventListenersBtnVoir() {
    let boutonsVoirPromo = document.querySelectorAll(".table-promo-btn-voir");
    boutonsVoirPromo.forEach(function (boutonVoirThisPromo) {
      boutonVoirThisPromo.addEventListener("click", function () {
        let idThisPromo = this.getAttribute("data-promo-id");
        voirThisPromo(idThisPromo);
      });
    });
  }
  
  
  function voirThisPromo(idThisPromo) {
    const bodyDashboard = document.getElementById("bodyDashboard");
  
    const url = "/displayThisPromo";
    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ idThisPromo: idThisPromo }),
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.text();
      })
      .then((data) => {
        bodyDashboard.innerHTML = "";
        bodyDashboard.innerHTML = data;
        appendNewScriptsUtilisateur();
        appendNewScriptsUtilisateur1();
        attachEventListenersBtnVoir();
      })
      .catch((error) => {
        console.error(
          "There has been a problem with your fetch operation:",
          error
        );
      });
  }
  
  
  attachEventListenersBtnVoir();
  