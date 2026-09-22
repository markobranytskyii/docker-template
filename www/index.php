<?php
session_start();
include 'database.php';

$zoek = $_GET['zoek'] ?? "";
$categorie = $_GET['categorie'] ?? "";

// TODO user story 1: haal alle gerechten op uit de database met PDO ($conn->prepare + execute + fetchAll)
// TODO user story 3: filter op categorie ($categorie) en zoek op naam ($zoek) met LIKE en prepared statements
$gerechten = [];

include 'header.php';
?>

<main>
    <form method="GET" class="zoekfilterbalk">
        <!-- TODO user story 3: pas de categorieen aan naar de categorieen uit jouw database -->
        <!-- TODO tech-eis veilige data: checked="<?php echo $categorie == '...' ? 'checked' : ''; ?>" toevoegen zodat de gekozen categorie na filteren aangevinkt blijft -->
        <div class="filter-opties">
            <label><input type="radio" name="categorie" value="">Alle</label>
            <label><input type="radio" name="categorie" value="Voorgerecht">Voorgerecht</label>
            <label><input type="radio" name="categorie" value="Hoofdgerecht">Hoofdgerecht</label>
            <label><input type="radio" name="categorie" value="Nagerecht">Nagerecht</label>
            <label><input type="radio" name="categorie" value="Drinken">Drinken</label>
        </div>

        <div class="zoekrij">
            <!-- TODO tech-eis veilige data: htmlspecialchars toepassen op $zoek -->
            <input type="text" name="zoek" placeholder="Zoek een gerecht op naam" value="<?php echo $zoek; ?>">
            <button type="submit" class="knop">Zoeken</button>
        </div>
    </form>

    <h2>Ons menu</h2>

    <div class="gerechten">
        <?php foreach ($gerechten as $gerecht): ?>
            <!-- TODO tech-eis veilige data: htmlspecialchars toepassen op alle velden hieronder -->
            <!-- Kolomnamen: gerecht.naam, gerecht.omschrijving, gerecht.foto, gerecht.id, en categorie_naam (uit een JOIN met categorie) -->
            <div class="gerecht">
                <img src="images/<?php echo $gerecht['foto']; ?>" alt="<?php echo $gerecht['naam']; ?>">
                <h3><?php echo $gerecht['naam']; ?></h3>
                <p><?php echo $gerecht['categorie_naam']; ?></p>
                <p><?php echo $gerecht['omschrijving']; ?></p>
                <a href="dish_detail.php?id=<?php echo $gerecht['id']; ?>" class="knop">Bekijk details</a>
            </div>
        <?php endforeach; ?>

        <?php if (count($gerechten) == 0) { ?>
            <p>Geen gerechten gevonden.</p>
        <?php } ?>
    </div>
</main>

<?php include 'footer.php'; ?>
