<?php
require_once "../dbConfig.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Fatal error");
}

if (isset($_POST['alumni_id'])) {
    $alumniId = $_POST['alumni_id'];
    
    $query = "SELECT alumni_id FROM alumni_details WHERE alumni_id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $alumniId); 
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result) {
            $results = $result->num_rows > 0;
        
            if ($results) {
                echo '<span style="color: green; margin-bottom:20px;">&#10004; </span>';
            } else {
                echo '<span style="color: red;">&#10008; </span>';
            }
        
            $result->close();
        }

        $stmt->close();
    } else {
        // Handle the case where the prepared statement failed
        echo "Error preparing statement";
    }
}

$conn->close();
?>
