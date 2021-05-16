<header>
    <h1>Peoples Health Pharmacy</h1>

    <?php
        if (isset($_SESSION["loggedin"]))
        {
            echo '<a href="index.php">Home </a>';
            echo '<a href="logout.php">Logout</a>';
        }
    ?>
</header>