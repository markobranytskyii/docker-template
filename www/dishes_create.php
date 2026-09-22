<?php
require 'session_check.php';

// TODO tech-eis rollen: alleen een Medewerker mag deze pagina zien (rolcheck)

require 'database.php';

// TODO: haal alle categorieën op uit de tabel 'categorie' met een PDO prepared statement,
// zodat de select hieronder gevuld kan worden
$categorieen = [];

include 'header.php';
?>

<main>
    <div class="detail">
        <h2>Nieuw gerecht toevoegen</h2>

        <?php if (isset($_GET['melding'])) { ?>
            <!-- TODO tech-eis veilige data: htmlspecialchars toepassen op de melding -->
            <p class="fout"><?php echo $_GET['melding']; ?></p>
        <?php } ?>

        <form action="dishes_create_process.php" method="post" enctype="multipart/form-data">
            <p>
                <label for="naam">Naam:</label>
                <input type="text" id="naam" name="naam" required>
            </p>
            <p>
                <label for="omschrijving">Beschrijving:</label>
                <textarea id="omschrijving" name="omschrijving" required></textarea>
            </p>
            <p>
                <label for="categorie_id">Categorie:</label>
                <select id="categorie_id" name="categorie_id" required>
                    <!-- TODO tech-eis veilige data: htmlspecialchars toepassen op $categorie['naam'] -->
                    <?php foreach ($categorieen as $categorie) { ?>
                        <option value="<?php echo (int) $categorie['id']; ?>"><?php echo $categorie['naam']; ?></option>
                    <?php } ?>
                </select>
            </p>
            <p>
                <label for="foto">Foto:</label>
                <input type="file" id="foto" name="foto" accept="image/*" required>
            </p>
            <button type="submit" class="knop">Toevoegen</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>
