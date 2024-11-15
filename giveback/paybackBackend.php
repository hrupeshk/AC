<!-- paybackBackend.php -->
<?php
$BASE_URL =  "http://localhost/AlumniConnect";

require_once "../dbConfig.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("fatal error");
}

if (isset($_POST['name']) && isset($_POST['alumni_id']) && isset($_POST['email']) && isset($_POST['transaction_id']) && 
isset($_FILES['attachment']) && isset($_POST['note'])) {

    $alumni_id = get_post($conn, 'alumni_id');
    $title = get_post($conn, 'transaction_id');
    $note = get_post($conn, 'note');

    // File handling with added security measures
    $filePath = "";
    if (isset($_FILES["attachment"]) && $_FILES["attachment"]["error"] == 0) {
        // Specify allowed file extensions and get the uploaded file extension
        $allowedExtensions = ["pdf", "doc", "docx", "jpg", "jpeg", "png", "gif"];
        $uploadedExtension = strtolower(pathinfo($_FILES["attachment"]["name"], PATHINFO_EXTENSION));
        // Check if the uploaded file extension is allowed
        if (in_array($uploadedExtension, $allowedExtensions)) {
            // Generate a unique filename to prevent overwriting existing files and move the uploaded file to the opportunity-uploads folder
            $filePath = "payback-uploads/" .microtime(true). "." . $uploadedExtension;
            // echo $filePath;
            move_uploaded_file($_FILES["attachment"]["tmp_name"], $filePath);
        } else {
            // Display invalid file type message and redirect to the form after 5 seconds using JavaScript
            echo "<div id='redirectMessage' style='text-align: center; margin: 100px auto; max-width: 800px; padding: 20px; border: 2px solid #e74c3c; border-radius: 10px; background-color: #f5f9fa;'>
                    <h3 style='color: #e74c3c; font-size: 24px;'>Invalid File Type 😟</h3>
                    <p style='color: #3498db; font-size: 18px;'>Please upload a pdf, doc or docx file.</p>
                    <p id='countdown' style='color: #2c3e50; font-size: 16px; margin-top: 20px; '>Redirecting to form in <span id='timer' style='font-weight: bold; font-size: 20px; color: #e74c3c;'>5</span> seconds...</p>
                </div>
                <script>
                    let seconds = 5;
                    let countdownElement = document.getElementById('timer');
                    let redirectMessage = document.getElementById('redirectMessage');

                    function updateCountdown() {
                    countdownElement.innerText = seconds;
                    if (seconds === 0) {
                        window.location.href = '$BASE_URL/giveback/payback.php';
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

    $query = "INSERT INTO payback_details(alumni_id, transaction_id, attachment, note) VALUES('$alumni_id', '$title', '$filePath', '$note')";
    $result = $conn->query($query);

    if ($result) {
        echo "<div style='text-align: center; margin: 100px auto; max-width: 800px; padding: 20px; border: 2px solid #34C759; border-radius: 10px; background: linear-gradient(135deg, #34C759, #ecf0f1);'>
        <h3 style='color: #2c3e50; font-size: 24px;'>🌟 Success!</h3>
        <p style='color: #2c3e50; font-size: 18px;'>Your achievements have been successfully shared. Thank you!</p>
        <p style='color: #2c3e50; font-size: 16px;'>You can explore more or return to the home page. 🎓</p>

        <a href='$BASE_URL/index.php'>
            <button style='margin-top: 30px; padding: 10px 20px; background-color: #2c3e50; color: #ffffff; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;'>Home</button>
        </a>
    </div>";
    } else {
        echo "<div style='text-align: center; margin: 100px auto; max-width: 800px; padding: 20px; border: 2px solid #FF3B30; border-radius: 10px; background: linear-gradient(135deg, #FF3B30, #ecf0f1);'>
        <h3 style='color: #2c3e50; font-size: 24px;'>❌ Error!</h3>
        <p style='color: #2c3e50; font-size: 18px;'>Failed to share achievements. Please try again later.</p>
        <p style='color: #2c3e50; font-size: 16px;'>You will be redirected to the sharing page in <span id='timer'>10</span> seconds.</p>
    </div>
    <script>
        let seconds = 10;
        function updateCountdown() {
            document.getElementById('timer').innerText = seconds;
            if (seconds === 0) {
                window.location.href = '$BASE_URL/giveback/payback.php';
            } else {
                seconds--;
                setTimeout(updateCountdown, 1000);
            }
        }
        updateCountdown();
    </script>";
    }
} else {
    // Handle the case when required fields are missing
    echo "<div style='text-align: center; margin: 100px auto; max-width: 800px; padding: 20px; border: 2px solid #FF3B30; border-radius: 10px; background: linear-gradient(135deg, #FF3B30, #ecf0f1);'>
            <h3 style='color: #2c3e50; font-size: 24px;'>❌ Error!</h3>
            <p style='color: #2c3e50; font-size: 18px;'>Missing required fields.</p>
            <p style='color: #2c3e50; font-size: 16px;'>You will be redirected to the sharing page in <span id='timer'>10</span> seconds.</p>
        </div>
        <script>
            let seconds = 10;
            function updateCountdown() {
                document.getElementById('timer').innerText = seconds;
                if (seconds === 0) {
                    window.location.href = '$BASE_URL/giveback/payback.php';
                } else {
                    seconds--;
                    setTimeout(updateCountdown, 1000);
                }
            }
            updateCountdown();
        </script>";
}

$conn->close();

function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}
?>
