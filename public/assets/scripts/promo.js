 function appendScripts() {
  const main = document.getElementById("main");
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



document
  .getElementById("btnRetourVersTousLesPromo1")
  .addEventListener("click", () => {
    const bodyDashboard = document.body

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
        appendScripts()
      })
      .catch((error) => {
        console.error("There was a problem with the fetch operation:", error);
      });
  });
