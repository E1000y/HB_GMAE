let loginForm = document.getElementById('login-form');

loginForm.addEventListener('submit', async function(event) {
    event.preventDefault(); // Empêche le rechargement de la page après la soumission du formulaire

    // Récupération des valeurs saisies des champs d'entrée
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;

    // Construction de l'objet de données à envoyer dans la requête POST
    let user = {
      username: username,
      password: password
    };
  
    try {
      // Envoi de la requête POST à l'API
      let response = await fetch('adresse du point de terminaison', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(user)
      });

      if (response.ok) {
        let data = await response.json();
        let authToken = data.token;
        // Stockage du token dans une sessionStorage
        sessionStorage.setItem('authToken', authToken);

        // Redirection vers la page d'accueil si la connexion est confirmée
        window.location.href = 'adresse de la page accueil';

      } else {
        // Affichage du message d'erreur si les informations de connexion ne sont pas correctes
        let errorMessage = document.getElementById('errorMessage');
        errorMessage.textContent = 'Les informations e-mail / mot de passe ne sont pas correctes.';
        errorMessage.style.display = 'block';
      }
    } catch (error) {
      console.error('Une erreur s\'est produite lors de la requête:', error);
    }
  });