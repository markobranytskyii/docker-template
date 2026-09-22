<?php
require 'session_check.php';

// TODO tech-eis rollen: alleen een Medewerker mag dit (rolcheck)

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "Ongeldige aanvraag.";
    exit;
}

require 'database.php';

$id           = $_POST['id'] ?? '';
$naam         = $_POST['naam'] ?? '';
$omschrijving = $_POST['omschrijving'] ?? '';
$categorie_id = $_POST['categorie_id'] ?? '';

// TODO tech-eis validatie: valideer alle velden voordat je opslaat
// TODO user story 14 (optioneel): UPDATE het gerecht met een PDO prepared statement (naam, omschrijving, categorie_id)

header("Location: dishes_index.php");
exit;
