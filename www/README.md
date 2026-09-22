# De Gouden Gerechten - TODO

Zoek in de code op `TODO` om alles te vinden.

## Database

Het schema staat in `sql/database.sql` (tabellen: `gebruiker`, `lid`, `medewerker`,
`adres`, `categorie`, `gerecht`), inclusief wat testdata. Importeer dit bestand zelf
in je database via phpMyAdmin (http://localhost:8000) of `docker compose exec`, ik
kan hier niet bij jouw draaiende database.

- [ ] TODO: `sql/database.sql` importeren in je database
- [ ] TODO: controleren dat `MYSQL_DATABASE` in `.env` en `$dbname` in `database.php`
      allebei `restaurant` zijn (staat al goed, niet meer aanpassen)

## Technische eisen
- [ ] TODO: rolcheck (sessie + rol) op alle medewerker-pagina's en op de lid-pagina's
- [ ] TODO: PDO prepared statements in alle queries
- [ ] TODO: wachtwoorden hashen en `password_verify()` in `login-process.php`
      (de testdata in `sql/database.sql` staat al gehasht)
- [ ] TODO: `htmlspecialchars()` op alle getoonde data
- [ ] TODO: validatie voor het opslaan (`dishes_create_process.php`, `dishes_edit_process.php`)

## Userstories
- [ ] TODO 1: gerechten ophalen (`index.php`)
- [ ] TODO 2: detailpagina (`dish_detail.php`)
- [ ] TODO 3: filteren op categorie en zoeken op naam (`index.php`)
- [ ] TODO 4: lid inloggen (`login-process.php`)
- [ ] TODO 5: uitloggen (`logout.php`, staat er al)
- [ ] TODO 8: eigen gegevens zien (`profile.php`)
- [ ] TODO 9: medewerker inloggen (`login-process.php`)
- [ ] TODO 10: gerechtenoverzicht (`dishes_index.php`)
- [ ] TODO 11: gerecht toevoegen (`dishes_create_process.php`)
- [ ] TODO 13: ledenoverzicht + zoeken op naam (`users_index.php`)
- [ ] TODO 14 (optioneel): gerecht bijwerken (`dishes_edit.php`, `dishes_edit_process.php`)
