document
  .getElementById("matinValiderLeCodeFormateur")
  .addEventListener("click", (event) => {
    event.preventDefault();

    const divBtnMatinValiderLeCodeFormateur = document.getElementById(
      "divBtnMatinValiderLeCodeFormateur"
    );
    const url = "/generateCodeMatin";

    fetch(url)
      .then((response) => {
        return response.text();
      })
      .then((result) => {
        divBtnMatinValiderLeCodeFormateur.innerHTML = result;

        // reappendScript();
      });
  });


  document
  .getElementById("apresMidiValiderLeCodeFormateur")
  .addEventListener("click", (event) => {
    event.preventDefault();

    const divBtnApresMidiValiderLeCodeFormateur = document.getElementById(
      "divBtnApresMidiValiderLeCodeFormateur"
    );
    const url = "/generateCodeApresMidi";

    fetch(url)
      .then((response) => {
        return response.text();
      })
      .then((result) => {
        divBtnApresMidiValiderLeCodeFormateur.innerHTML = result;

        // reappendScript();
      });
  });