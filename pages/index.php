<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <div id="login-status" style="color: white; padding: 10px;"></div>

  <script>
    fetch('php/check_login.php')
      .then(response => response.json())
      .then(data => {
        const loginDiv = document.getElementById('login-status');
        if (data.loggedin) {
          loginDiv.textContent = `✅ Ingelogd als ${data.email}`;
        } else {
          loginDiv.textContent = `🔒 Niet ingelogd`;
        }
      });
  </script>

  <!-- Hero Sectie -->
  <section class="hero-section">
    <h1><b>VvE Diensten Limburg ...ontzorgt</b> </h1>
    <p>VvE dienstverlening financiële-en beheerdienstverlening</p>
    <div class="mouse">
      <div class="roll"></div>
      <div class="rollshadow"></div>
    </div>
  </section>

  <!-- Dienstverlening Sectie -->
  <section class="dienstverlening">
    <div class="dienstverlening-container">
      <div class="dienstverlening-content">

        <!-- Tekstkolom -->
        <div class="dienstverlening-tekst">
          <h2>Onze Dienstverlening</h2><br>
          <p>
            Wij zijn al jaren actief in diverse takken van de financiële-en beheerdienstverlening.
            In de loop der jaren steeg de vraag naar VvE-diensten. En sinds enige tijd zijn wij ons hierin gaan
            specialiseren.
            Onze handelswijze (informeel, korte lijnen, altijd direct en hetzelfde aanspreekpunt.) wordt door onze
            relaties
            zeer gewaardeerd.
            Daardoor groeide ook de vraag naar onze diensten. <br><br>
          </p>
          <p>
            Onze werkzaamheden betreffen dienstverlening inzake particulier
            onroerend goed (VvE), maar ook zakelijke panden zoals loodsen en kantoren. We zijn dus allround actief.
            De focus ligt hierbij op ontzorging: wij regelen het beheer van de VvE en - indien nodig - ook het bestuur.
          </p>
        </div>

        <!-- Afbeeldingkolom -->
        <div class="dienstverlening-afbeelding">
          <img src="../Images/vergadering.png" alt="Vergadering VvE" />
        </div>

      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="footer-top-border"></div>

    <div class="footer-container">
      <!-- Linkerkolom: Naam en logo -->
      <div class="footer-column logo-col">
        <h2>VvE Diensten Limburg </h2>
        <p>VvE beheer</p>
        <img src="../Images/Logo_wit.png" alt="VvE Logo" class="footer-logo" />
      </div>

      <!-- Middenkolom: Adres en contact -->
      <div class="footer-column contact-col">
        <strong>VvE Diensten Limburg</strong><br />
        Einighauserweg 19<br />
        6143 BN Guttecoven<br /><br />
        06 41 643 770
        <br>
        info@vvedienstenlimburg.nl<br><br>
        <a href="https://www.facebook.com/profile.php?id=61581407607665" class="fa fa-facebook"></a>
        <a href="https://www.instagram.com/vvedienstenlimburg/" class="fa fa-instagram"></a>
        <a href="https://nl.linkedin.com/in/vve-limburg-92a6b6386?trk=people-guest_people_search-card"
          class="fa fa-linkedin"></a>
      </div>

      <!-- Rechterkolom: Links en certificering -->
      <div class="footer-column links-col">
        <a href="../Images/3. Algemene voorwaarden VvE Diensten Limburg.pdf">Algemene voorwaarden</a><br />
        <a href="klachtenprocedure.php">Klachtenprocedure</a><br />
      </div>
    </div>

    <div class="footer-bottom">
      <p>&copy; 2025 VvE Diensten Limburg</p>
      <p><a href="cookieverklaring.php">Cookieverklaring</a> | <a href="privacyverklaring.php">Privacyverklaring</a>
      </p>
    </div>
  </footer>