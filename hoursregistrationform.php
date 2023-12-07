<?php
require_once 'hoursregistration.php';

// Maak een instantie van UrenRegistratie
$hoursregistration = new hoursregistration();

// Controleer of het formulier is ingediend en ontvang de geselecteerde ProjectCode
$registrations = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedProjectCode = isset($_POST['selectedProjectCode']) ? $_POST['selectedProjectCode'] : null;
    echo "Selected Project Code: " . $selectedProjectCode;

    // Roep de getAllhoursregistration-methode aan
    $registrations = $hoursregistration->getAllhoursregistration($selectedProjectCode);

    // Voeg deze regels toe om de resultaten te controleren
    echo "Resultaat van getAllhoursregistration: ";
    var_dump($registrations);
}

// Maak een instantie van LogisticDB
$logisticDB = new LogisticDB();

// Gebruik LogisticDB om projectgegevens op te halen
$projects = $logisticDB->getAllProjectsByUserRole($_SESSION['user_role']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urenregistratie Overzicht</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
<h2>Urenregistratie Overzicht</h2>
<a href='addhoursform.php'><button>Uren toevoegen</button></a>

<!-- Voeg dit formulier toe aan het begin van je HTML-body -->
<form method="post" action="">
    <br>
    <label for="tableSelector">Selecteer Tabel: </label>
    <select id="tableSelector" name="selectedProjectCode">
        <?php
        foreach ($projects as $project) {
            echo "<option value='{$project['Code']}'>{$project['Title']} ({$project['Code']})</option>";
        }
        ?>
    </select>
    <input type="submit" name="submitForm" value="Toon Overzicht">
</form>

<?php
// Voer de foreach-lus alleen uit als $registrations is ingesteld en geen lege array is
if ($registrations !== null && !empty($registrations)):
    ?>
    <table>
        <thead>
        <tr>
            <th>Project Code</th>
            <th>Project Title</th>
            <th>Project Start Date Time</th>
            <th>Project End Date Time</th>
            <th>Project Max Hours</th>
            <th>User Name</th>
            <th>Entry Date Time</th>
            <th>Work Date Time</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($registrations as $registratie): ?>
            <tr>
                <td><?php echo $registratie['ProjectCode']; ?></td>
                <td><?php echo $registratie['ProjectTitle']; ?></td>
                <td><?php echo $registratie['ProjectStartDateTime']; ?></td>
                <td><?php echo $registratie['ProjectEndDateTime']; ?></td>
                <td><?php echo $registratie['ProjectMaxHours']; ?></td>
                <td><?php echo $registratie['UserName']; ?></td>
                <td><?php echo $registratie['EntryDateTime']; ?></td>
                <td><?php echo $registratie['WorkDateTime']; ?></td>
                <td><?php echo $registratie['Description']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
</body>
</html>

<!--    maximale uren weergeven
        Urenregistratie
        Medewerkers boeken hun uren op projecten. Zij moeten dus de code van een project kunnen
        invoeren of selecteren en een datum, aantal uren en een toelichting kunnen invoeren.
        Het spreekt voor zich dat zij dit alleen kunnen doen bij projecten waaraan ze meewerken.
        Oftewel, waaraan ze zijn gekoppeld.

       urenregistratie
            Gewerkte uren inboeken (op gekoppeld project).
            Overzicht opvragen van eigen geboekte uren.

       projectbeheer
            Totaaloverzicht lopende projecten met geboekte uren.
            Overzicht uren per werknemer per project.
-->