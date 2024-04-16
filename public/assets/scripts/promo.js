
document
  .getElementById("btnRetourVersTousLesPromo1")
  .addEventListener("click", () => {
    const bodyDashboard = document.getElementById("bodyDashboard");

    fetch("/dashboard")
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.text();
      })
      .then((data) => {
        bodyDashboard.innerHTML = "";
        bodyDashboard.innerHTML = data;
      })
      .catch((error) => {
        console.error("There was a problem with the fetch operation:", error);
      });
  });
