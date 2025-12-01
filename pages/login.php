<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

  <!-- Navigatiebalk -->
  <nav class="navbar">
    <div class="navbar-left">
      <img src="../Images/Logo_wit.png" alt="Logo" class="logo" />
    </div>
    <ul class="navbar-menu">
      <li><a href="index.php">Home</a></li>
      <li><a href="vve.php">VvE</a></li>
      <li><a href="overOns.php">Over ons</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="login.php">Login</a></li>
    </ul>
  </nav>

  <div class="login-container">
    <h2>Welkom terug!</h2>

    <form id="loginForm">
      <input id="username" type="text" name="username" placeholder="Gebruikersnaam" required>
      <input id="email" type="email" name="email" placeholder="Email" required>
      <input id="password" type="password" name="password" placeholder="Wachtwoord" required>

      <button type="submit">Login</button>

      <div id="error" style="display:none; color:red; margin-top:10px;"></div>

      <p class="register-link">
        Heb je geen account? <a href="register.php">Registreer hier</a>
      </p>

      <div class="back-button">
        <a href="index.php">← Terug naar home</a>
      </div>
    </form>
  </div>

  <!-- JavaScript onderin body zodat alle elementen al geladen zijn -->
  <script>
    document.getElementById("loginForm").addEventListener("submit", async function(e) {
      e.preventDefault();

      const email    = document.getElementById("email").value;
      const password = document.getElementById("password").value;
      const errorDiv = document.getElementById("error");

      try {
        const response = await fetch("../php/login.php", {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
        });

        const result = await response.json();

        if (result.success) {
          // Redirect naar dashboard
          window.location.href = "../php/dashboard.php";
        } else {
          errorDiv.textContent = result.message;
          errorDiv.style.display = "block";
        }
      } catch (err) {
        errorDiv.textContent = "Er is een fout opgetreden. Probeer het later opnieuw.";
        errorDiv.style.display = "block";
      }
    });
  </script>

</body>
</html>
