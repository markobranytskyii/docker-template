<?php
require 'session_check.php';

// TODO tech-eis rollen: alleen een Employee mag deze pagina zien (rolcheck op $_SESSION['role'])

require 'database.php';

// TODO user story 10: haal alle gerechten op met een PDO prepared statement
$gerechten = [];

include 'header.php';
?>

<main>
    <div class="detail breed">
        <h2>Alle gerechten</h2>

        <table class="tabel">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Categorie</th>
                    <th>Beschrijving</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <!-- TODO tech-eis veilige data: htmlspecialchars toepassen -->
                <!-- Kolomnamen: gerecht.naam, gerecht.omschrijving, gerecht.id, en categorie_naam (uit een JOIN met categorie) -->
                <?php foreach ($gerechten as $gerecht) { ?>
                    <tr>
                        <td><?php echo $gerecht['naam']; ?></td>
                        <td><?php echo $gerecht['categorie_naam']; ?></td>
                        <td><?php echo $gerecht['omschrijving']; ?></td>
                        <td>
                            <a href="dish_detail.php?id=<?php echo (int) $gerecht['id']; ?>">Bekijk</a>
                            <!-- TODO user story 14 (optioneel): link naar dishes_edit.php?id=... -->
                            <a href="dishes_edit.php?id=<?php echo (int) $gerecht['id']; ?>">Bewerken</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php include 'footer.php'; ?>
