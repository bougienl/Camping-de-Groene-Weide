<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camping "de Groene Weide"</title>
    <link rel="stylesheet" href="../src/styles.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Swanky+and+Moo+Moo&display=swap" rel="stylesheet">
</head>

<?php
require '../config/db.php';

$sql = "SELECT * FROM contact_form";
$result = $conn->query($sql);

$messages = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}

$conn->close();
?>

<body>

<nav>
    <div class="navbar-rechts">
        <ul>
            <a href="../public/index.html">
                <img src="../assets/image.png" width="80">
            </a>

            <a href="../public/overons.html">
                <li> Over ons</li>
            </a>

            <a href="../public/contact.php" target="_blank">
                <li> Contact </li>
            </a>
        
            <a href="../public/opdekaart.html">
                <li>Op de Kaart</li>
            </a>

            <div class="reserverenknop">
                    <a href="#">
                        <li>Reserveren</li>
                    </a>
            </div>
        </ul>
    </div>
</nav>
<div class="filling"></div>
<div class="gridcontainer">
    <div class="header1">
        <h1>Neem contact op met ons</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
    </div>
    <div class="brownie">
        <svg class="back" width="613" height="515" viewBox="0 0 613 515" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="645" height="515" fill="#AA9956"/>
        </svg>
        <svg class="cookie" xmlns="http://www.w3.org/2000/svg" width="555" height="555" viewBox="0 0 686 693" fill="none">
            <path d="M549.554 622.222C398.674 737.257 183.971 707.057 70 554.768C-43.9707 402.48 -14.0501 185.772 136.83 70.7377C287.709 -44.2969 502.413 -14.097 616.384 138.191C730.354 290.479 700.434 507.187 549.554 622.222Z" fill="url(#paint0_linear_867_937)"/>
            <defs>
                <linearGradient id="paint0_linear_867_937" x1="573.544" y1="90.7393" x2="23.4813" y2="502.4" gradientUnits="userSpaceOnUse">
                <stop stop-color="#AA9956"/>
                <stop offset="1" stop-color="#C0AC71"/>
                </linearGradient>
            </defs>
        </svg>
        <div class="adress">
            <h1>Boerencamping<br>
                "De Groene Weide"</h1>
                <p><object data="../assets/phone.svg" style="margin-bottom: 0.25rem;"></object>+31 592 8492829<br>
                <object data="../assets/pin-1.svg" style="margin-bottom: -0.5rem;"></object>Balloo 26 9458TA,Balloo, Drenthe<br>
                <object data="../assets/mail.svg" style="margin-bottom: -0.75rem;"></object>Bertdebeste@gmail.com</p>
        </div>

    </div>

</div>
<div class="form-container">
    <form action="submit.php" method="POST">
        <div class="form-content">
            <div class="inline-group">
                <div class="name">
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" id="name" name="name" placeholder="Joe Smith" required>
                    </div>
                </div>
                <div class="email">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="voorbeeld@voorbeeld.nl" required>
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="phone">Telefoonnummer</label>
                    <input class="phone" type="phone" id="phone" name="phone" placeholder="06 12345678" required>
                </div>
            </div>
            <div class="form-group">
                <label for="message">Bericht</label>
                <textarea class="message" id="message" name="message" rows="5" placeholder="Schrijf hier je bericht" maxlength="200" required ></textarea>
            </div>
            <div class="form-group">
                <a class="privacypolicy" href="">Privacybeleid</a>
            </div>
            <button class="button" type="submit">Versturen ⇒</button>
        </div>
    </form>
</div>
<div class="mapsroutebox">
    <div class="maps">
        <img src="../assets/location.png">
    </div>
    <div class="route">
        <h1>
            Route
        </h1>
        <p style="color: #8DB411">Met de auto</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
        <p style="color: #8DB411">Met de trein/bus</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
    </div>
</div>
</body>

<footer class="footer">
    <div class="column1">
        <h1>Contact</h1>
        <p><object data="../assets/phone.svg" style="margin-bottom: 0.25rem;"></object>+31 592 8492829<br>
        <object data="../assets/pin-1.svg" style="margin-bottom: -0.5rem;"></object>Balloo 26 9458TA,Balloo, Drenthe<br>
        <object data="../assets/mail.svg" style="margin-bottom: -0.75rem;"></object>Bertdebeste@gmail.com</p>
    </div>
    <div class="column2">
    <a href="#"><h1>Faciliteiten</h1></a>
    <a href=""><h1>Accomodaties</h1></a>
    <a href=""><h1>Reserveren</h1></a>
    </div>
    <div class="column3">
    <h1>Extra informatie</h1>
    <h1>Openingstijden</h1>
    
    </div>
</footer>
