<?php

class DB_con {
    private $conn; // Database connection object

    // Constructor
    public function __construct() {
        // Database configuration
        $hostname = "localhost";     // Hostname or IP address of the database server
        $username = "root"; // Username to connect to the database
        $password = ""; // Password to connect to the database
        $database = "nidinfox_surapp"; // Name of the database

        // Create a connection object
        $this->conn = mysqli_connect($hostname, $username, $password, $database);

        // Check the connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    // Function to fetch user certificate number by ID
    public function user_certi_no($id) {
        $query = "SELECT * FROM `tbl_submission` WHERE id=$id";
        $result = mysqli_query($this->conn, $query);

        // Check for query success
        if ($result) {
            // Fetch and return the result
            return mysqli_fetch_assoc($result);
        } else {
            // Display error message
            echo "Query error: " . mysqli_error($this->conn);
        }
    }

    // Function to close the database connection
    public function close() {
        mysqli_close($this->conn);
    }
}

?>
