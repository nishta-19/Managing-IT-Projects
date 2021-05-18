<?php
include 'config.php';
session_start();

$filename = "Sales_" . date('Y-m-d') . ".csv"; 
$delimiter = ","; 
 
// Create a file pointer 
$f = fopen('php://memory', 'w'); 
 
// Set column headers 
$fields = array('SalesID', 'Date', 'ProductID', 'Ammount', 'UserID', 'Customer'); 
fputcsv($f, $fields, $delimiter); 
 
// Get records from the database 

$start = $_SESSION['post-data']['StartDate'];
$end = $_SESSION['post-data']['EndDate'];
$result = $con->query("SELECT * FROM Sales WHERE Date Between  ORDER BY SalesID DESC"); 
if($result->num_rows > 0){ 
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $result->fetch_assoc()){ 
        $lineData = array($row['SalesID'], $row['Date'], $row['ProductID'], $row['Ammount'], $row['UserID'], $row['Customer']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
} 
 
// Move back to beginning of file 
fseek($f, 0); 
 
// Set headers to download file rather than displayed 
header('Content-Type: text/csv'); 
header('Content-Disposition: attachment; filename="' . $filename . '";'); 
 
// Output all remaining data on a file pointer 
fpassthru($f); 
 
// Exit from file 
exit();
?>