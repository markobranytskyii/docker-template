<?php
session_start();
include 'database.php';

// TODO user story 2: controleer of $_GET['id'] bestaat en numeriek is, anders terugsturen naar index.php
// TODO user story 2: haal het gerecht op met een PDO prepared statement (WHERE id = :id)
$gerecht = null;

include 'header.php';
?>

<main>
    <div class="detail">
        <?php if ($gerecht) { 
            
            ?>
            <!-- TODO tech-eis veilige data: htmlspecialchars toepassen op alle velden hieronder -->
            <h2><?php echo $gerecht['naam']; ?></h2>
            <img src="images/<?php echo $gerecht['foto']; ?>" alt="<?php echo $gerecht['naam']; ?>">
            <p><strong>Beschrijving:</strong> <?php echo $gerecht['omschrijving']; ?></p>
            <p><strong>Categorie:</strong> <?php echo $gerecht['categorie_naam']; ?></p>
        <?php } else { ?>
            <p>Gerecht niet gevonden.</p>
        <?php } ?>

        <a href="index.php" class="knop">Terug</a>
    </div>
</main>

<?php include 'footer.php'; ?>
