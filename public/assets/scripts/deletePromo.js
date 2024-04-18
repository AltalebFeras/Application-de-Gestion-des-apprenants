function appendNewScripts() {
  const mainTableScripts = document.getElementById("mainTableScripts");
  let scripts = mainTableScripts.querySelectorAll("script");

  for (let i = 0; i < scripts.length; i++) {
    if (!scripts[i].innerText) {
      let script = document.createElement("script");
      script.src = scripts[i].src;

      mainTableScripts.removeChild(scripts[i]);
      mainTableScripts.appendChild(script);
    }
  }
}

function attachEventListenersBtnDelete() {
  let boutonsDeletePromo = document.querySelectorAll(".table-promo-btn-delete");
  boutonsDeletePromo.forEach(function (boutonDeleteThisPromo) {
    boutonDeleteThisPromo.addEventListener("click", function () {
      let idThisPromo = this.getAttribute("data-promo-id");
      deleteThisPromo(idThisPromo);
    });
  });
}

function deleteThisPromo(idThisPromo) {
  const tablePromoDiv = document.getElementById("tablePromoDiv");

  const url = "/deletePromotion";
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
      tablePromoDiv.innerHTML = "";
      tablePromoDiv.innerHTML = data;
      appendNewScripts();
      attachEventListenersBtnDelete();
    })
    .catch((error) => {
      console.error(
        "There has been a problem with your fetch operation:",
        error
      );
    });
}

attachEventListenersBtnDelete();
