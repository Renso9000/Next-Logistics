<?php
require_once 'dtb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve player ID from the form
    $ID = $_POST['projectData_id'];

    // Delete the data from the database
    $deleteQuery = "DELETE FROM projectData WHERE ProjectDataID = :ID";
    $deleteStatement = $logisticDB->prepare($deleteQuery);
    $deleteStatement->bindValue(':ID', $ID);

    try {
        $deleteStatement->execute();
        echo "Data removed successfully!";
        // You can add a link to go back to the admin panel or any other action you desire.
        header("Location: admin.php");
    } catch (PDOException $e) {
        echo "Error removing data: " . $e->getMessage();
    }
}
?>