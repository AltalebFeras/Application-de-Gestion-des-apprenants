


  document.getElementById("createNewPromoBtn").addEventListener("click", (event) => {

    event.preventDefault();
    const tablePromoDiv = document.getElementById("tablePromoDiv");
    // let promotionsDiv = document.getElementById('promotionsDiv');
    // let ajouterPromoDiv = document.getElementById('ajouterPromoDiv');

    const inputPromoNom = document.getElementById("promoNom");
    const inputDateDebut = document.getElementById("dateDebut");
    const inputDateFin = document.getElementById("dateFin");
    const inputPlaceDispo = document.getElementById("placeDispo");

    const inputPromoNomValue = inputPromoNom.value;
    const inputDateDebutValue = inputDateDebut.value;
    const inputDateFinValue = inputDateFin.value;
    const inputPlaceDispoValue = inputPlaceDispo.value;

    const url = "/ajouterPromotion";

    const promo = {
      promoNom: inputPromoNomValue,
      dateDebut: inputDateDebutValue,
      dateFin: inputDateFinValue,
      placeDispo: inputPlaceDispoValue,
    };

    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(promo),
    })
      .then((response) => {
        return response.text();
      })
      .then((result) => {
        promotionsDiv.classList.remove('d-none')
        tablePromoDiv.innerHTML = "";
        tablePromoDiv.innerHTML = result;
        ajouterPromoDiv.classList.add('d-none')

      });
  });


// function displayThisPromo() {
//   let displayThisPromoBtn = document.getElementById("displayThisPromoBtn");
//   const body = document.body;

//   if (displayThisPromoBtn) {
//     displayThisPromoBtn.addEventListener("click", () => {
//       fetch("/displayThisPromo")
//         .then((response) => {
//           if (!response.ok) {
//             throw new Error("Network response was not ok");
//           }
//           return response.text();
//         })
//         .then((data) => {
//           body.innerHTML = data;
//           servicePromo.displayFormAjouterApprenant();
//           servicePromo.retourVersTousLesPromoDeApprenant();
//         })
//         .catch((error) => {
//           console.error("There was a problem with the fetch operation:", error);
//         });
//     });
//   } else {
//     console.error("displayThisPromoBtn not found in the DOM");
//   }
// }
