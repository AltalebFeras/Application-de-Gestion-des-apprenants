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


  function attachAddEventBtnDelete() {
    let boutonsDeleteUser = document.querySelectorAll(".table-user-btn-delete");
    boutonsDeleteUser.forEach(function (boutonDeleteThisUser) {
      boutonDeleteThisUser.addEventListener("click", function () {
        let idThisUser = boutonDeleteThisUser.getAttribute("data-user-id"); // Fix here
        deleteThisUser(idThisUser);
      });
    });
  }
  
  
  function deleteThisUser(idThisUser) {
    const tableUserDiv = document.getElementById("tableUserDiv");
  
    const url = "/deleteUser";
    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ idThisUser: idThisUser }),
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.text();
      })
      .then((data) => {
        tableUserDiv.innerHTML = "";
        tableUserDiv.innerHTML = data;
        appendNewScriptsUtilisateur();
        attachAddEventBtnDelete();
      })
      .catch((error) => {
        console.error(
          "There has been a problem with your fetch operation:",
          error
        );
      });
  }
  
  attachAddEventBtnDelete();
  