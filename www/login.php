<?php
session_start();
include 'header.php';
?>

<main>
    <div class="detail">
        <h2>Inloggen</h2>

        <?php if (isset($_GET['melding'])) { ?>
            <p class="fout">
                <?php
                if ($_GET['melding'] == 'wrongpassword') {
                    echo 'Wachtwoord is onjuist';
                } else {
                    echo 'Gebruiker niet gevonden';
                }
                ?>
            </p>
        <?php } ?>

        <form action="login-process.php" method="post">
            <p>
                <label for="login">Email of gebruikersnaam</label>
                <input type="text" name="login" id="login" placeholder="email of gebruikersnaam">
            </p>
            <p>
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password" placeholder="wachtwoord">
            </p>
            <button type="submit" name="submit" class="knop">Inloggen</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>
