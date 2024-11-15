<?php
    // profile.php
    
    require "../dbConfig.php";

    // Create a new mysqli object for database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get program and year from the URL parameters
    $program = $_GET['program'];
    $year = $_GET['year'];

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT alumni_details.*, contact_details.*, programme_details.*
            FROM alumni_details 
            JOIN contact_details ON alumni_details.roll_no = contact_details.roll_no
            JOIN programme_details ON alumni_details.prog_id = programme_details.prog_id
            WHERE alumni_details.prog_id = ? AND alumni_details.passout_year = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $program, $year);
    $stmt->execute();
    
    // Get the result set
    $result = $stmt->get_result();

    if ($result === false) {
        die("Error executing query: " . $conn->error);
    }

    // Fetch the results
    $data = $result->fetch_all(MYSQLI_ASSOC);
   
    $stmt->close();
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Profiles</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href ="../style.css">
</head>
<body>

<?php require "../utility/header.php"; ?>

<div class="mainContainer">
    <div class="headingContainer">
        <?php
        echo '<div class="subheading">';

        if (!empty($data)) {
            $firstProfile = $data[0];
            $classYear = $firstProfile['passout_year'];
            $progInitial = $firstProfile['prog_initial'];
            echo '<h1>'. $progInitial .' Class of ' . $classYear . '</h1>';
        } else {
            echo '<h1>No records found</h1>';
        }
       

        echo '</div>';
        ?>
    </div>

    <div class="cardContainer">
        <?php
        if (empty($data)) {
            echo '<p>No records found for the specified program and year.</p>';
        } else {
            foreach ($data as $profile) {
                echo '<div class="card">';
                echo '<h3>' . $profile['name'] . '</h3>';
                echo '<p><strong>Roll No:</strong> ' . $profile['roll_no'] . '</p>';
                echo '<p><strong>Programme:</strong> ' . $profile['prog_initial'] . '</p>';
                echo '<p><strong>Passout Year:</strong> ' . $profile['passout_year'] . '</p>';
                // echo '<p><strong>Phone:</strong> ' . $profile['phone'] . '</p>';
                // echo '<p><strong>Email:</strong> ' . $profile['email'] . '</p>';
                // More fields can be added here if required
                echo '</div>';
            }
        }
        
        ?>
    </div>
</div>

<?php require "../utility/footer.php"; ?>

</body>
</html>