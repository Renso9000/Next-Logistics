<?php
class LogisticDB {
    private $pdo;

    // Database credentials
    private $hostname = 'localhost';
    private $database = 'ala_nextlogistics';
    private $username = 'root';
    private $password = '';

    // Constructor to establish the database connection
    public function __construct() {
        $dsn = "mysql:host={$this->hostname};dbname={$this->database}";

        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            echo "Connected to the database successfully!";
        } catch (PDOException $e) {
            // Handle database connection errors
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // Method to prepare statement
    public function prepare($query) {
        return $this->pdo->prepare($query);
    }

    // Method to fetch project-table
    public function getAllProjects() {
        $query = "SELECT * FROM project";
        $statement = $this->pdo->query($query);
        $projects = $statement->fetchAll(PDO::FETCH_ASSOC);
        //return $statement->fetchAll(PDO::FETCH_ASSOC);
        // Debug output
        echo "Debug - All Projects: ";
        print_r($projects);

        return $projects;
    }

    // Method to fetch projectdata-table
    public function getAllProjectData() {
        $query = "SELECT * FROM projectdata";
        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    // Method to fetch projectdata-table
    public function getProjectDataByCode($projectCode) {
        $query = "SELECT pd.* FROM projectdata pd
              JOIN project p ON pd.ProjectID = p.ID
              WHERE p.Code = :projectCode";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':projectCode', $projectCode, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // Method to fetch projectusers-table
    public function getAllProjectUsers() {
        $query = "SELECT * FROM projectusers";
        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to fetch project-table based on user role
    public function getAllProjectsByUserRole($userRole) {
        if ($userRole === 'admin') {
            // Als de gebruiker een admin is, haal alle projecten op
            $query = "SELECT * FROM project WHERE Active = 1";
        } elseif ($userRole === 'gebruiker') {
            // Als de gebruiker een gebruiker is, haal alleen projecten op waarvoor de gebruiker rechten heeft
            $query = "
                SELECT p.*
                FROM project p
                JOIN projectusers pu ON p.ID = pu.ProjectID
                JOIN users u ON pu.UserID = u.ID
                WHERE p.Active = 1
                    AND (
                        u.Name = :userName
                        AND pu.MayManage = 0
                    )
            ";

        } else {
            // Onbekende gebruikersrol, hier kun je een foutafhandeling toevoegen of een standaardactie uitvoeren
            // Op dit moment retourneert de functie een lege array
            return [];
        }

        // Voorbereiden en uitvoeren van de query
        $statement = $this->pdo->prepare($query);

        if ($userRole === 'gebruiker') {
            $statement->bindParam(':userName', $_SESSION['user_name'], PDO::PARAM_STR);
        }

        $statement->execute();

        // Resultaten weergeven
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }




    // Method to fetch users-table
    public function getAllUsers() {
        $query = "SELECT * FROM users";
        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Close database connection
    public function closeConnection() {
        $this->pdo = null;
        echo "<script>console.log(Connection closed.);</script>";
    }
}

// Create instance
$logisticDB = new LogisticDB();