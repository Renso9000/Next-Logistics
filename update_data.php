<?php
require_once 'dtb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $ID = $_POST['projectData_id'];
    $updatedData = $_POST['updated_data'];

    // Update the stats in the database using the prepare method from SoccerDatabase
    $updateQuery = "UPDATE projectdata WHERE ProjectDataID = :ID";
    $updateStatement = $logisticDB->prepare($updateQuery);
    $updateStatement->bindValue(':ID', $ID);

    try {
        $updateStatement->execute();

        // Fetch the updated stats from the database
        $selectQuery = "SELECT * FROM projectdata WHERE ProjectDataID = :ID";
        $selectStatement = $logisticDB->prepare($selectQuery);
        $selectStatement->bindValue(':ID', $ID);
        $selectStatement->execute();

        // Fetch the updated stats
        $updatedData = $selectStatement->fetch(PDO::FETCH_ASSOC);

        // Display the updated stats
        echo "updated successfully! Updated Stats: $updatedData";

        header("Location: admin.php");
    } catch (PDOException $e) {
        echo "Error updating data: " . $e->getMessage();
    }
}
?>