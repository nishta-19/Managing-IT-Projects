<header>
    <h1>Peoples Health Pharmacy</h1>

    <?php
        if (isset($_SESSION["loggedin"]))
        {
            //echo '<a href="index.php">Home </a>';
            echo '<a href="logout.php">Logout</a>';
        }
    ?>
</header>

<div id="main">
    <nav>
        <ul>
            <li><a href="display_sales_records.php">Display Sales Records</a></li>
            <li><a href="add_sales_records.php">Add sales records</a></li>
            <li><a href="edit_sales_records.php">Edit sales records</a></li>
            <li><a href="monthly_sales.php">Reports</a></li>
        </ul>
    </nav>