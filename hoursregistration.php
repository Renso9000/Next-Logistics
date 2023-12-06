<?php
require_once 'dtb.php';

class hoursregistration {
    private $db;

    public function __construct() {
        // Maak een instantie van LogisticDB
        $this->db = new LogisticDB();
    }

    // Method om alle hoursregistration op te halen
    public function getAllhoursregistration() {
        // Query om een overzicht van de hoursregistration op te vragen
        $query = "
            SELECT
                Project.Code AS ProjectCode,
                Project.Title AS ProjectTitle,
                Project.StartDT AS ProjectStartDateTime,
                Project.EndDT AS ProjectEndDateTime,
                Project.MaxHours AS ProjectMaxHours,
                Users.Name AS UserName,
                Projectdata.EntryDT AS EntryDateTime,
                Projectdata.WorkDT AS WorkDateTime,
                Projectdata.Description AS Description
            FROM
                Projectdata
            JOIN
                Project ON Projectdata.ProjectID = Project.ID
            JOIN
                Users ON Projectdata.UserID = Users.ID
            WHERE
                Project.Active = true
                AND Users.Active = true
            ORDER BY
                Project.Code DESC
        ";

        // Voorbereiden en uitvoeren van de query
        $statement = $this->db->prepare($query);
        $statement->execute();

        // Resultaten weergeven
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Sluit de databaseverbinding
        $this->db->closeConnection();

        return $result;
    }
}
?>
