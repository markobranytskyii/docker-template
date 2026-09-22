<nav class="navbar">
    <a href="index.php">Menu</a>

    <?php if (isset($_SESSION['user_id'])) { ?>

        <?php if ($_SESSION['role'] == 'Lid') { ?>
            <a href="profile.php">Mijn gegevens</a>
        <?php } ?>

        <?php if ($_SESSION['role'] == 'Medewerker') { ?>
            <a href="dishes_index.php">Gerechten beheren</a>
            <a href="dishes_create.php">Nieuw gerecht</a>
            <a href="users_index.php">Leden</a>
        <?php } ?>

        <a href="logout.php">Uitloggen</a>
    <?php } else { ?>
        <a href="login.php">Inloggen</a>
    <?php } ?>

</nav>

