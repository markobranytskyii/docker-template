<?php

$login    = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

if ($login == '' || $password == '') {
    header("location: login.php?melding=usernotfound");
    exit;
}

require 'database.php';

// TODO user story 4/9: haal de gebruiker op met een PDO prepared statement
// (WHERE email = :login OR gebruikersnaam = :login)
$user = null;

if (is_array($user)) {
    // TODO tech-eis veilige data: controleer het wachtwoord met password_verify($password, $user['wachtwoord'])
    // (de wachtwoorden in je database moeten dan gehasht zijn met password_hash())
    if (false) {
        // TODO user story 4/9: bepaal de rol van deze gebruiker: zoek zijn/haar id op in de tabel 'lid'
        // en in de tabel 'medewerker'. In welke tabel een match gevonden wordt, bepaalt de rol.
        $rol = null; // 'Lid' of 'Medewerker'

        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $rol;
        $_SESSION['firstname'] = $user['voornaam'];
        $_SESSION['lastname'] = $user['achternaam'];

        // TODO user story 4/9: stuur een lid naar index.php en een medewerker naar dishes_index.php
        header("location: index.php");
        exit;
    } else {
        header("location: login.php?melding=wrongpassword");
        exit;
    }
} else {
    header("location: login.php?melding=usernotfound");
    exit;
}
