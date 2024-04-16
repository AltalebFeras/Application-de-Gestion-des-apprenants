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
        appendNewScripts()
      });
  });