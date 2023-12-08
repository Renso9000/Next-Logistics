<?php
require_once 'dtb.php';

class AddHours
{
    private $db;

    public function __construct()
    {
        // Maak een instantie van LogisticDB
        $this->db = new LogisticDB();
    }

    // Methode om uren toe te voegen
    public function voegUrenToe($projectCode, $date, $entryDT, $workDT, $description)
    {
        // Hier zou je de invoer moeten valideren voordat je deze aan de database toevoegt

        // Voorbereidingsquery om uren toe te voegen aan de Projectdata-tabel
        $query = "
            INSERT INTO Projectdata (ProjectID, UserID, EntryDT, WorkDT, Description)
            VALUES (
                (SELECT ID FROM Project WHERE Code = :projectCode),
                :userID, 
                :entryDT, 
                :workDT, 
                :description
            )
        ";

        // Vervang dit door de daadwerkelijke gebruikers-ID, bijvoorbeeld uit een sessie
        $userID = 2;

        // Datum- en tijdinstellingen
        $entryDT = $date . ' ' . $entryDT;
        $workDT = $date . ' ' . $workDT;

        // Bind parameters aan de query
        $parameters = [
            ':projectCode' => $projectCode,
            ':userID' => $userID,
            ':entryDT' => $entryDT,
            ':workDT' => $workDT,
            ':description' => $description,
        ];

        // Voorbereiden en uitvoeren van de query
        $statement = $this->db->prepare($query);
        $statement->execute($parameters);
    }

    // Methode om de databaseverbinding te sluiten
    public function closeConnection()
    {
        $this->db->closeConnection();
    }

    // Methode om een prepared statement te maken
    public function prepare($query)
    {
        return $this->db->prepare($query);
    }
}
?>
