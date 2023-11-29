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

    // Close database connection
    public function closeConnection() {
        $this->pdo = null;
        echo "<script>console.log(Connection closed.);</script>";
    }
}

// Create instance
$logisticDB = new LogisticDB();