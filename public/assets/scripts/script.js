// JavaScript code for navigation and form submission
function navigateTo(url) {
  fetch(url)
      .then(response => response.text())
      .then(html => {
          document.getElementById('main-content').innerHTML = html;
      })
      .catch(error => console.error('Error:', error));
}

// Function to handle form submission
function submitForm() {
  fetch(HOME_URL, {
      method: "POST",
      headers: {
          'Content-Type': 'application/json'
      },
      body: JSON.stringify('Ma première requête')
  })
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.error('Error:', error));
}

// Add event listeners to your navigation links/buttons
document.getElementById('btn_Connexion').addEventListener('click', function() {
  navigateTo('/dashboard');
});

// Add event listener to the form submission button
document.getElementById('btn_Connexion').addEventListener('click', function (e){
  e.preventDefault(); // Prevent default form submission behavior
  submitForm();
});
