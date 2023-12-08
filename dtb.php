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
        } catch (PDOException $e) {
            // Handle database connection errors
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // Method to fetch project-table
    public function getAllProjects() {
        $query = "SELECT * FROM project";
        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to fetch projectdata-table
    public function getAllProjectData() {
        $query = "SELECT * FROM projectdata";
        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to fetch projextusers-table
    public function getAllProjectUsers() {
        $query = "SELECT * FROM projectusers";
        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to fetch users-table
    public function getAllUsers() {
        $query = "SELECT * FROM users";
        $statement = $this->pdo->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to deativate data in the database
    public function updateProjectStatus($projectId) {
        try {
            $tableName = 'project';
            $sql = "UPDATE $tableName SET Active = 0 WHERE ID = :projectId AND Active = 1";

            // Use prepared statement to prevent SQL injection
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();

            return true; 
        } catch (PDOException $e) {
            return false;
        }
    }

    // Close database connection
    public function closeConnection() {
        if ($this->pdo !== null) {
            $this->pdo = null;
        }
    }
}

// Create instance
$logisticDB = new LogisticDB();