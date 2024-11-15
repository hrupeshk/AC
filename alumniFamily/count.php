<?php
    // count.php

    require "../dbConfig.php"; 

    // Create a new mysqli object for database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }

    // Make a query to the alumni_details table to get the number of alumni in each program based on prog_id 
    $sql = "SELECT prog_id, COUNT(*) AS count FROM alumni_details GROUP BY prog_id";
    $result = $conn->query($sql);

    $programCounts = [];

    if ($result->num_rows > 0) {
        $programCounts = $result->fetch_all(MYSQLI_ASSOC);
    }
    
    $conn->close();

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($programCounts);
?>
