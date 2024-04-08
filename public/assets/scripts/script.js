const route = (event) => {
  event = event || window.event;
  event.preventDefault();
  window.history.pushState({}, "", event.target.href);
  handleLocation();
};

const routes = {
  404: "404",
  "/": "/",
  "/connexion": "/connexion",
  "/admin": "admin",
  "/dashboard": "dashboard",
};

const handleLocation = async () => {
  const path = window.location.pathname;
  const route = routes[path] || routes[404];
  const html = await fetch(route).then((data) => data.text());
  document.getElementById("main-page").innerHTML = html;
};

window.onpopstate = handleLocation;
window.route = route;

handleLocation();
























// document
//   .getElementById("togglePassword")
//   .addEventListener("click", function () {
//     var motDePasseInput = document.getElementById("motDePasse");
//     var motDePasseVerifierInput = document.getElementById("motDePasseVerifier");
//     var togglePasswordSpan = document.getElementById("togglePassword");

//     if (motDePasseInput.type === "password") {
//       motDePasseInput.type = "text";
//       motDePasseVerifierInput.type = "text";
//       togglePasswordSpan.textContent = "Cacher le MDP";
//     } else {
//       motDePasseInput.type = "password";
//       motDePasseVerifierInput.type = "password";
//       togglePasswordSpan.textContent = "Voir le MDP";
//     }
//   });


 