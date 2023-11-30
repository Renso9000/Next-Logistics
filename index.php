<?php 
require_once 'dtb.php';

//Remove previous session
session_unset();
session_destroy();

//Start new session
session_start();

// // Create instance for LogisticDB
// $logisticDB = new LogisticDB();

// // Fetch users-table
// $users = $logisticDB->getAllUsers();

// // Close database connection
// $logisticDB->closeConnection();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Next-Logistics</title>
</head>
<body>
    <form action="#" method="post">
        <div class="statusOptions">
            <input type='range' name='status' id="user" value='Gebruiker' />
            <label for="user">User</label>
            <input type='range' name='status' id="admin" value='Admin' />
            <label for="admin">admin</label>
        </div>
        <input type="submit" name="submit" value="Inloggen">
    </form>
    <a href="admin.php">Admin</a>
</body>
</html>

<?php 

if(isset($_POST['status'])){
    $status = $_POST['status'];
}

$_SESSION['status'] = $status;

?>