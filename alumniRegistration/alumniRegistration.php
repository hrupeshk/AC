<?php
    // alumniRegistration.php

    // Base URL
    $BASE_URL =  "http://localhost/AlumniConnect";

    // Include dbConfig.php to connect to the database
    require "../dbConfig.php";

    // connection to the database
    $connection = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Include inputValidation.php to use the validation and sanitization functions
    require "inputValidation.php";
    // Include generateId.php to use the generateAlumniId() function
    require "generateId.php";

    $phoneNumber = '';
    $uid = '';

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate and sanitize form data
        $name = validateAndSanitizeName($_POST["name"]);
        $email = validateAndSanitizeEmail($_POST["email"]);
        $programme = sanitizeProgramme($_POST["programme"]);
        $passoutYear = sanitizePassoutYear($_POST["passoutYear"]);
        $linkedin = sanitizeLinkedIn($_POST["linkedin"]);
        $note = sanitizeNote($_POST["note"]);

        $phoneNumber = isset($_POST["phoneNumber"]) ? $_POST["phoneNumber"] : '';
        $uid = isset($_POST["uid"]) ? $_POST["uid"] : '';
        
        checkAndRedirect($phoneNumber, $uid);

        // SQL query with prepared statement
        $sql = "SELECT roll_no FROM alumni_details WHERE name = ? AND prog_id = ? AND passout_year = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sss", $name, $programme, $passoutYear);
        $stmt->execute();
        $stmt->bind_result($roll_no);

        // Fetch the result for the first query
        if (!$stmt->fetch()) {
            // Display error message and redirect
            echo "<div id='redirectMessage' style='text-align: center; margin: 100px auto; max-width: 800px; padding: 20px; border: 2px solid #3498db; border-radius: 10px; background-color: #f5f9fa;'>
            <h3 style='color: #e74c3c; font-size: 24px;'>Oops! 😟 No Matching Data Found</h3> 
            <p style='color: #3498db; font-size: 18px;'>It seems there's no record matching your provided information. Please double-check your name, program, and graduation year.</p> 
            <p id='countdown' style='color: #2c3e50; font-size: 16px; margin-top: 20px; '>Redirecting to form in <span id='timer' style='font-weight: bold; font-size: 20px; color: #e74c3c;'>10</span> seconds...</p>
            </div>

            <form id='inv' style='display:none;' action='alumniForm.php' method='post'>
                <input type='text' id='phoneNo' name='phoneNumber' required value='$phoneNumber'>
                <input type='text' id='uid' name='uid' required value='$uid'>
                <input type='submit' value='Submit'>
            </form>

            <script>
                let seconds = 5;
                let countdownElement = document.getElementById('timer');
                let redirectMessage = document.getElementById('redirectMessage');

                function updateCountdown() {
                    countdownElement.innerText = seconds;
                    if (seconds === 0) {
                        // sumbit the form
                        document.getElementById('inv').submit();
                    } else {
                        seconds--;
                        setTimeout(updateCountdown, 1000);
                    }
                }
                // Start the countdown
                updateCountdown();
            </script>";
            exit();
        }
        // Close the first statement
        $stmt->close();

        // Check if alumni_id is NULL for the retrieved roll_no
        $checkAlumniIdQuery = "SELECT alumni_id FROM alumni_details WHERE roll_no = ?";
        $checkAlumniIdStatement = $connection->prepare($checkAlumniIdQuery);
        $checkAlumniIdStatement->bind_param("s", $roll_no);
        $checkAlumniIdStatement->execute();
        $checkAlumniIdStatement->bind_result($existingAlumniId);
        $checkAlumniIdStatement->fetch();
        $checkAlumniIdStatement->close();

        if ($existingAlumniId != null) {
            echo "<div style='text-align: center; margin: 100px auto; max-width: 800px; padding: 20px; border: 2px solid #6c5ce7; border-radius: 10px; background: linear-gradient(135deg, #6c5ce7, #ecf0f1);'>
                <h3 style='color: #2c3e50; font-size: 24px;'>🌟 Welcome Back!</h3>
                <p style='color: #2c3e50; font-size: 18px;'>Delighted to see you again! You're already an essential part of our alumni community. For any queries or assistance, feel free to reach out — we're here to help!</p>
                <p style='color: #2c3e50; font-size: 16px;'>Thank you for being a valued member of our alumni family! 🎓</p>
                <a href='$BASE_URL/index.php'>
                    <button style='margin-top: 30px; padding: 10px 20px; background-color: #2c3e50; color: #ffffff; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;'>Home</button>
                </a>
            </div>";
            exit();
        }

        // Continue with the rest of the code for new data submission

        // Image handling with added security measures
        $imagePath = ""; // Set a default value
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            // Specify allowed file extensions and Get the uploaded file extension
            $allowedExtensions = ["jpg", "jpeg", "png"];
            $uploadedExtension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

            // Check if the uploaded file extension is allowed
            if (in_array($uploadedExtension, $allowedExtensions)) {
                // Generate a unique filename to prevent overwriting existing files and Move the uploaded file to the profile-uploads folder
                $imagePath = "profile-uploads/" .microtime(true). "." . $uploadedExtension;
                move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
            } else {
                // Display invalid file type message and Redirect to the form after 5 seconds using JavaScript
            echo "<div id='redirectMessage' style='text-align: center; margin: 100px auto; max-width: 800px; padding: 20px; border: 2px solid #e74c3c; border-radius: 10px; background-color: #f5f9fa;'>
                    <h3 style='color: #e74c3c; font-size: 24px;'>Invalid File Type 😟</h3>
                    <p style='color: #3498db; font-size: 18px;'>Please upload a JPG, JPEG, or PNG file.</p>
                    <p id='countdown' style='color: #2c3e50; font-size: 16px; margin-top: 20px; '>Redirecting to form in <span id='timer' style='font-weight: bold; font-size: 20px; color: #e74c3c;'>5</span> seconds...</p>
                </div>

                <form id='inv' style='display:none;' action='alumniForm.php' method='post'>
                    <input type='text' id='phoneNo' name='phoneNumber' required value='<?php echo $phoneNumber; ?>'>
                    <input type='text' id='uid' name='uid' required value='<?php echo $uid; ?>'>
                    <input type='submit' value='Submit'>
                </form>

                <script>
                    let seconds = 5;
                    let countdownElement = document.getElementById('timer');
                    let redirectMessage = document.getElementById('redirectMessage');

                    function updateCountdown() {
                    countdownElement.innerText = seconds;
                    if (seconds === 0) {
                        // submit the form
                        document.getElementById('inv').submit();
                    } else {
                        seconds--;
                        setTimeout(updateCountdown, 1000);
                    }
                    }
                    // Start the countdown
                    updateCountdown();
                </script>";

                exit();
            }
        }

        // Generate alumni_id by calling the generateAlumniId() function from generateId.php
        $alumniId = generateAlumniId($programme, $passoutYear, $connection);
        // Update data in alumni_details table
        $updateAlumniDetailsQuery = "UPDATE alumni_details SET alumni_id = ?, profile_image = ?, note = ? WHERE roll_no = ?";
        $updateAlumniDetailsStatement = $connection->prepare($updateAlumniDetailsQuery);
        $updateAlumniDetailsStatement->bind_param("ssss", $alumniId, $imagePath, $note, $roll_no);
        $updateAlumniDetailsStatement->execute();
        $updateAlumniDetailsStatement->close();

        // Update data in contact_details table
        $updateContactDetailsQuery = "UPDATE contact_details SET phone = ?, email = ?, linkedin = ?, uid = ? WHERE roll_no = ?";
        $updateContactDetailsStatement = $connection->prepare($updateContactDetailsQuery);
        $updateContactDetailsStatement->bind_param("sssss", $phoneNumber, $email, $linkedin, $uid, $roll_no);
        $updateContactDetailsStatement->execute();
        $updateContactDetailsStatement->close();

        // Send email with alumni_id to the provided email address using respond.php
        // Include respond.php to send email
        include "respond.php";
        
        // Check if email was sent successfully
        if ($emailSentSuccessfully) {
            // Update IdStatus to 1 (sent) in alumni_details table
            $updateStatusQuery = "UPDATE alumni_details SET IdStatus = 1 WHERE alumni_id = ?";
            $updateStatusStatement = $connection->prepare($updateStatusQuery);
            $updateStatusStatement->bind_param("s", $alumniId);
            $updateStatusStatement->execute();
            $updateStatusStatement->close();

            // Output success message if email was sent successfully
            echo "<div style='text-align: center; margin: 100px auto; max-width: 800px; padding: 20px; border: 2px solid #27ae60; border-radius: 10px; background-color: #d5f5e3;'>
                <h3 style='color: #27ae60; font-size: 24px;'>🎉 Success! Your Request is Complete</h3> 
                <p style='color: #34495e; font-size: 18px;'>Congratulations! Your unique <strong style='color: #e74c3c;'>Alumni ID</strong> has been successfully sent to the provided email address.</p> 
                <p style='color: #3498db; font-size: 16px;'>Thank You! Have a fantastic day! 🌟</p>
                <a href='$BASE_URL/index.php'>
                <button style='margin-top: 30px; padding: 10px 20px; background-color: #2c3e50; color: #ffffff; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;'>Home</button>
                </a>
            </div>";
        } else {
            // Output error message if the email could not be sent
            echo "<div style='text-align: center; margin: 100px auto; max-width: 800px; padding: 20px; border: 2px solid #3498db; border-radius: 10px; background: linear-gradient(135deg, #3498db, #85c1e9);'>
                <h3 style='color: #ffffff; font-size: 24px;'>🎉 Success! Your Request is Complete</h3> 
                <p style='color: #34495e; font-size: 18px;'>Congratulations! Your unique <strong style='color: #e74c3c;'>Alumni ID</strong> will be send soon to the provided email address.</p> 
                <p style='color: #2c3e50; font-size: 16px;'>Thank You! Have a fantastic day! 🌟</p>
                <a href='$BASE_URL/index.php'>
                <button style='margin-top: 30px; padding: 10px 20px; background-color: #2c3e50; color: #ffffff; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;'>Home</button>
                </a>
            </div>";
        }
    }
    
    // Close the database connection
    $connection->close();

    checkAndRedirect($phoneNumber, $uid);

    function checkAndRedirect($phoneNumber, $uid) {
        // Check if the user has verified their phone number
        if (empty($phoneNumber) || empty($uid)) {
            header("Location: auth.php?message=First verify your phone number.");
            exit();
        }
    }
?>