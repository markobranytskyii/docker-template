<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Je bent niet ingelogd.";
    echo "<br/><a href='login.php'>Login hier in</a>";
    exit;
}

// TODO tech-eis rollen: alleen een Medewerker mag dit (rolcheck)

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "Ongeldige aanvraag.";
    exit;
}

require 'database.php';

$naam = $_POST['naam'] ?? '';
$omschrijving = $_POST['omschrijving'] ?? '';
$categorie_id = $_POST['categorie_id'] ?? '';

// TODO tech-eis validatie: naam (verplicht, min. 2 tekens), omschrijving (verplicht, niet leeg)
// en categorie_id (verplicht, numeriek). Stuur de gebruiker terug naar dishes_create.php?melding=...
// en sla niets op als de validatie mislukt.

// Afbeelding uploaden
$foto_pad = "";

if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $bestandsnaam = basename($_FILES['foto']['name']);
    $doelbestand  = "images/" . $bestandsnaam;

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $doelbestand)) {
        $foto_pad = $bestandsnaam;
    } else {
        header("location: dishes_create.php?melding=Upload van afbeelding is mislukt");
        exit;
    }
} else {
    header("location: dishes_create.php?melding=Geen afbeelding gekozen");
    exit;
}

// TODO user story 11: sla het gerecht op met een PDO prepared statement (naam, omschrijving, foto, categorie_id)

header("Location: dishes_index.php");
exit;
