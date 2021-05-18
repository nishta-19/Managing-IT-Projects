<?php
include 'config.php';
session_start();

$filename = "Sales_" . $_SESSION['StartDate'] ."_". $_SESSION['EndDate'] . ".csv"; 
$delimiter = ","; 
 
// Create a file pointer 
$f = fopen('php://memory', 'w'); 
 
// Set column headers 
$fields = array('SalesID', 'Date', 'ProductID', 'Ammount', 'UserID', 'Customer'); 
fputcsv($f, $fields, $delimiter); 
 
// Get records from the database 
$stmt = $con->prepare("SELECT * FROM Sales WHERE Date Between ? AND ? ORDER BY SalesID DESC");
$stmt->bind_param('ss', $_SESSION['StartDate'], $_SESSION['EndDate']);
$stmt->execute();
$result = $stmt->get_result(); 
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