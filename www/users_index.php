<?php
require 'session_check.php';

// TODO tech-eis rollen: alleen een Employee mag deze pagina zien (rolcheck)

require 'database.php';

$zoek = $_GET['zoek'] ?? "";

// TODO user story 13: haal alle leden op (JOIN gebruiker, lid en adres, voor de adresgegevens), met een PDO prepared statement
// TODO user story 13: als $zoek niet leeg is, zoek op voornaam/achternaam met LIKE :zoek
$leden = [];

include 'header.php';
?>

<main>
    <div class="detail breed">
        <h2>Alle leden</h2>

        <form method="GET" class="zoekform">
            <!-- TODO tech-eis veilige data: htmlspecialchars toepassen op $zoek -->
            <input type="text" name="zoek" placeholder="Zoek op naam" value="<?php echo $zoek; ?>">
            <button type="submit" class="knop">Zoeken</button>
        </form>

        <table class="tabel">
            <thead>
                <tr>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Email</th>
                    <th>Adres</th>
                </tr>
            </thead>
            <tbody>
                <!-- TODO tech-eis veilige data: htmlspecialchars toepassen -->
                <?php foreach ($leden as $lid) { ?>
                    <tr>
                        <td><?php echo $lid['voornaam']; ?></td>
                        <td><?php echo $lid['achternaam']; ?></td>
                        <td><?php echo $lid['email']; ?></td>
                        <td><?php echo $lid['straat'] . ', ' . $lid['postcode'] . ' ' . $lid['plaats']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php if (count($leden) == 0) { ?>
            <p>Geen leden gevonden.</p>
        <?php } ?>
    </div>
</main>

<?php include 'footer.php'; ?>
