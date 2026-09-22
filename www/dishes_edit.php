<?php
require 'session_check.php';

// TODO tech-eis rollen: alleen een Medewerker mag deze pagina zien (rolcheck)

require 'database.php';

// TODO user story 14 (optioneel): valideer $_GET['id'] en haal het gerecht op met een PDO prepared statement
$gerecht = null;

// TODO: haal alle categorieën op uit de tabel 'categorie' met een PDO prepared statement,
// zodat de select hieronder gevuld kan worden
$categorieen = [];

include 'header.php';
?>

<main>
    <div class="detail">
        <h2>Gerecht bewerken</h2>

        <?php if ($gerecht) { ?>
            <!-- TODO tech-eis veilige data: htmlspecialchars toepassen op alle value="" hieronder -->
            <form action="dishes_edit_process.php" method="post">
                <input type="hidden" name="id" value="<?php echo (int) $gerecht['id']; ?>">
                <p>
                    <label for="naam">Naam:</label>
                    <input type="text" id="naam" name="naam" value="<?php echo $gerecht['naam']; ?>" required>
                </p>
                <p>
                    <label for="omschrijving">Beschrijving:</label>
                    <textarea id="omschrijving" name="omschrijving" required><?php echo $gerecht['omschrijving']; ?></textarea>
                </p>
                <p>
                    <label for="categorie_id">Categorie:</label>
                    <select id="categorie_id" name="categorie_id" required>
                        <!-- TODO tech-eis veilige data: htmlspecialchars toepassen op $categorie['naam'] -->
                        <!-- TODO: selected="selected" toevoegen op de optie die gelijk is aan $gerecht['categorie_id'] -->
                        <?php foreach ($categorieen as $categorie) { ?>
                            <option value="<?php echo (int) $categorie['id']; ?>"><?php echo $categorie['naam']; ?></option>
                        <?php } ?>
                    </select>
                </p>
                <button type="submit" class="knop">Opslaan</button>
            </form>
        <?php } else { ?>
            <p>Gerecht niet gevonden.</p>
        <?php } ?>

        <a href="dishes_index.php" class="knop">Terug</a>
    </div>
</main>

<?php include 'footer.php'; ?>
