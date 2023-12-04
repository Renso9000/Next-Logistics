<?php 
require_once 'dtb.php';

//Remove previous session
// session_unset();
// session_destroy();

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
        <h2>Kies hier je status</h2>
        <div class="statusOptions">
            <input type='radio' name='status' id="user" value='user' required/>
            <label for="user">Gebruiker</label><br/>
            <input type='radio' name='status' id="admin" value='admin' required/>
            <label for="admin">Admin</label>
        </div><br/>
        <input type="submit" name="submit" value="Inloggen">
    </form>
</body>
</html>

<?php 

if(isset($_POST['submit'])){
    $status = $_POST['status'];
    $_SESSION['status'] = $status;
    // var_dump($_SESSION['status']);
    header('Location: admin.php');
}

?>