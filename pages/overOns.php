<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Over ons</title>
  <link rel="stylesheet" href="../css/overOns.css">
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
    <nav class="navbar2">
      <div class="navbar-left">
        <h1>Over ons</h1>
      </div>
  </section>

  <div class="container">
    <!-- Dienstverlening Sectie -->
    <section class="dienstverlening">
      <div class="dienstverlening-container">
        <div class="dienstverlening-content">

          <!-- Tekstkolom -->
          <div class="dienstverlening-tekst">
            <h2>Onze kenmerken</h2><br>
            <br>
            <h4>Kwaliteit </h4>
            <p>Bij VVE Diensten Limburg speelt goede kwaliteit een belangrijke rol.</p>
            <br>
            <H4>Communicatie</H4>
            <p>Communicatie houdt ons bedrijf sterk, het voorkomt misverstanden. Het zorgt voor een efficiënte
              samenwerking
              met onze klanten.</p>
            <br>
            <H4>Betrouwbaarheid</H4>
            <p>Wij houden ons aan afspraken en zorgen ervoor dat het beheer altijd in vertrouwde handen is.</p>
            <br>
            <H4>Professionaliteit</H4>
            <p>Met jarenlange ervaring en deskundigheid bieden wij een professionele aanpak die bijdraagt aan
              wooncomfort en toekomstwaarde.</p>

            <br>
          </div>

        </div>
    </section>

    <selection>
      <div class="mid_bar">
        <div class="mid_column onze-doelen">
          <img src="../Images/laptop.jpg" alt="Laptop Over Ons" class="laptop" />
          <div>
            <h1>Onze doelen</h1>
            <br>
            <h3>Samen zorgen voor wooncomfort en toekomstwaarde</h3>
            <p>Als Vereniging van Eigenaren werken we aan een goed onderhouden gebouw en een fijne
              leefomgeving voor iedereen. Elk lid draagt hieraan bij, omdat we samen verantwoordelijk
              zijn voor het beheer van onze gezamenlijke ruimtes en voorzieningen. Om dit professioneel en
              efficiënt te organiseren, bieden wij ondersteuning die aansluit bij de wensen van de vereniging.
              Of het nu gaat om onderhoud, financieel beheer of advies: wij zorgen dat de VvE vandaag goed
              functioneert en morgen sterk blijft.</p>
          </div>

        </div>
      </div>
    </selection>

    <div class="container">
      <!-- Dienstverlening Sectie -->
      <section class="dienstverlening">
        <div class="dienstverlening-container">
          <div class="dienstverlening-content">

            <!-- Tekstkolom -->
            <div class="dienstverlening-tekst">
              <h2>Interesse in onze dienst?</h2>
              <br>
              <p>Ben je benieuwd naar wat VvE-beheer precies inhoudt en wat wij daarin voor jou kunnen betekenen?
                Wij vertellen je hier graag meer over. Of het nu gaat om financieel beheer, technisch onderhoud of
                administratieve ondersteuning: wij staan klaar om jouw VvE op een professionele en efficiënte manier
                te ontzorgen. </p>
              <br>
              <p>Neem gerust contact met ons op voor een vrijblijvend gesprek. We beantwoorden al je vragen en voorzien
                je van de informatie die je nodig hebt om een weloverwogen keuze te maken. Samen kijken we hoe wij het
                beheer van jouw VvE het beste kunnen ondersteunen.</p>
              <br>
              <button onclick="document.location='contact.html'" id="button"> Neem contact op </button>
            </div>

          </div>
      </section>

      <footer class="footer">
        <div class="footer-top-border"></div>

        <div class="footer-container">
          <!-- Linkerkolom: Naam en logo -->
          <div class="footer-column logo-col">
            <h2>VvE Diensten Limburg</h2>
            <p>VvE beheer</p>
            <img src="../Images/Logo_wit.png" alt="VvE Logo" class="footer-logo" />
          </div>

          <!-- Middenkolom: Adres en contact -->
          <div class="footer-column contact-col">
            <strong>Ons team</strong><br />
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
          <p><a href="cookieverklaring.php">Cookieverklaring</a> | <a
              href="privacyverklaring.php">Privacyverklaring</a></p>
        </div>
      </footer>
    </div>