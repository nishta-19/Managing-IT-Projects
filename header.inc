<header>
    <h1>Peoples Health Pharmacy</h1>


</header>

<div id="main">
    <nav>
        <ul>
            <li><a href="display_sales_records.php">Display Sales Records</a></li>
            <li><a href="add_sales_records.php">Add sales records</a></li>
            <li><a href="monthly_sales.php">Display Monthly Sales Report</a></li>
                <?php
        if (isset($_SESSION["loggedin"]))
        {
            //echo '<li><a href="display_sales_records.php">Home </a></li>';
            echo '<li id="logout"><a href="logout.php">Logout</a></li>';
        }
    ?>
        </ul>
    </nav>