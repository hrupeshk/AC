<!-- mentorBackend.php -->
<?php
$BASE_URL =  "http://localhost/AlumniConnect";

require_once "../dbConfig.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("fatal error");
}

if (isset($_POST['name']) && isset($_POST['alumni_id']) && isset($_POST['email']) && isset($_POST['eligibility']) && isset($_POST['description'])) {

    $alumni_id = get_post($conn, 'alumni_id');
    $title = get_post($conn, 'eligibility');
    $description = get_post($conn, 'description');

    $query = "INSERT INTO mentor_details(alumni_id, eligibility, description) VALUES('$alumni_id', '$title', '$description')";
    $result = $conn->query($query);

    if ($result) {
        echo "<div style='text-align: center; margin: 100px auto; max-width: 800px; padding: 20px; border: 2px solid #34C759; border-radius: 10px; background: linear-gradient(135deg, #34C759, #ecf0f1);'>
        <h3 style='color: #2c3e50; font-size: 24px;'>🌟 Success!</h3>
        <p style='color: #2c3e50; font-size: 18px;'>Your mentor details have been successfully shared. Thank you!</p>
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
                window.location.href = '$BASE_URL/giveback/mentor.php';
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
                    window.location.href = '$BASE_URL/giveback/mentor.php';
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
