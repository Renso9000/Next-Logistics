<?php
include 'addhours.php';

// Maak een instantie van AddHours
$addHours = new AddHours();

// Als het formulier is ingediend
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Valideer de ingevoerde gegevens (hier moet je mogelijk nog aanpassingen doen)
    $projectCode = $_POST['projectCode'];
    $datum = $_POST['date'];
    $entryDT = $_POST['entryDT'];
    $workDT = $_POST['workDT'];
    $description = $_POST['description'];

    // Voeg de uren toe aan de database
    $addHours->voegUrenToe($projectCode, $datum, $entryDT, $workDT, $description);

    echo '<p>Uren zijn succesvol toegevoegd!</p>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uren Invoeren</title>
</head>
<body>
<h2>Uren Invoeren</h2>
<form method="post" action="">
    <label for="projectCode">Project Code:</label>
    <input type="text" name="projectCode" required><br>

    <label for="date">Datum:</label>
    <input type="date" name="date" required><br>

    <label for="entryDT">Begintijd:</label>
    <input type="time" name="entryDT" required><br>

    <label for="workDT">Eindtijd:</label>
    <input type="time" name="workDT" required><br>

    <label for="description">Toelichting:</label>
    <textarea name="description"></textarea><br>

    <input type="submit" value="Uren Toevoegen">
</form>
<a href='hoursregistrationform.php'><button>Uren overzicht</button></a>
</body>
</html>
