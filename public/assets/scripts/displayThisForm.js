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

document.getElementById("displayThisPromoBtn").addEventListener("click", () => {
    const bodyDashboard = document.getElementById("bodyDashboard");
  
    fetch("/displayThisPromo")
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.text();
      })
      .then((data) => {
        bodyDashboard.innerHTML = "";
        bodyDashboard.innerHTML = data;
        appendNewScriptsUtilisateur()
      });
  });