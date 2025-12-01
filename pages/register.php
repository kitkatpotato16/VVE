<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registreer</title>
  <link rel="stylesheet" href="../css/register.css"/>
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
      <li><a href="login.php">Login</a></li>
    </ul>
  </nav>

  <div class="login-container">
    <h1>Hey maak hier een account aan</h1>
    <form action="../php/register_process.php" method="POST">
      <input type="text" name="username" placeholder="Gebruikersnaam" required><br>
      <input type="email" name="email" placeholder="Email" required><br>
      <input type="password" name="password" placeholder="Wachtwoord" required><br>
      <button type="submit">Registreer</button>
    </form>



    <div id="error" style="display:none; color: red; margin-top: 10px;"></div>


    <script>
      document.getElementById("registerForm").addEventListener("submit", async function (e) {
        e.preventDefault();

        const text = document.getElementById("username").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const messageBox = document.getElementById("messageBox");

        const response = await fetch("register_process.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
        });

        const result = await response.json();

        if (result.success) {
          messageBox.textContent = "Registratie gelukt! Je kunt nu inloggen.";
          messageBox.className = "message success";
          messageBox.style.display = "block";
          document.getElementById("registerForm").reset();
        } else {
          messageBox.textContent = result.message;
          messageBox.className = "message";
          messageBox.style.display = "block";
        }
      });
    </script>
    <div class="back-button">
      <a href="login.php">← Terug naar login</a>
    </div>
  </div>
</body>

</html>