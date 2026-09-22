<?php
require 'session_check.php';
require 'database.php';

$user_id = $_SESSION['user_id'];

// TODO user story 8: haal de gegevens van het ingelogde lid op (JOIN gebruiker, lid en adres) met een PDO prepared statement
$user = null;

include 'header.php';
?>

<main>
    <div class="detail">
        <h2>Mijn gegevens</h2>

        <?php if ($user) { ?>
            <!-- TODO tech-eis veilige data: htmlspecialchars toepassen op alle velden -->
            <p><strong>Voornaam:</strong> <?php echo $user['voornaam']; ?></p>
            <p><strong>Achternaam:</strong> <?php echo $user['achternaam']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            <p><strong>Straat:</strong> <?php echo $user['straat']; ?></p>
            <p><strong>Postcode:</strong> <?php echo $user['postcode']; ?></p>
            <p><strong>Woonplaats:</strong> <?php echo $user['plaats']; ?></p>
        <?php } else { ?>
            <p>Geen gegevens gevonden.</p>
        <?php } ?>
    </div>
</main>

<?php include 'footer.php'; ?>
