<!-- auth.php -->

<?php require "../utility/header.php"; ?>

<?php
    // Check if a message is present in the query parameters
    $message = isset($_GET['message']) ? $_GET['message'] : '';

    // Define default styles for the alert
    $alertStyles = 'padding: 15px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 4px;';

    // Check if the message is not empty
    if (!empty($message)) {
        // Add specific styles based on the message type (you can customize this part)
        if (strpos($message, 'Error') !== false) {
            $alertStyles .= 'background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;';
        } elseif (strpos($message, 'Success') !== false) {
            $alertStyles .= 'background-color: #d4edda; color: #155724; border-color: #c3e6cb;';
        } else {
            // Default styles for other messages  
            $alertStyles .= 'background-color: #cce5ff; color: #004085; border-color: #b8daff;';
        }
    }
?>

<?php 
    require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Verification</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../utility/footer.css">
    <link rel="stylesheet" href="auth.css">
</head>
<body>

    <div class="authContainer">

        <?php
        // Display the alert with inline styles
        if (!empty($message)) {
            echo '<div style="' . $alertStyles . '">' . $message . '</div>';
        }
        ?>

        <h2>Phone No. Verification</h2>

        <!-- Add reCAPTCHA container -->
        <div id="recaptcha-container"></div>

        <form id="phoneForm">
            <label for="phoneNumber">Phone No</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone no." required>
            <button id="sign-in-button" type="button"> Send OTP </button>
        </form>

        <form id="otpForm" style="display:none;">
            <label for="otp">OTP</label>
            <input type="text" id="otp" name="otp" placeholder="Enter the OTP here" required>
            <button id="submit" type="button">Verify OTP</button>
        </form>

        <form id="inv" style="display:none;" action="alumniForm.php" method="post">
            <input type="text" id="phoneNo" name="phoneNumber" required>
            <input type="text" id="uid" name="uid" required>
            <input type="submit" value="Submit">
        </form>
    </div>

    <?php require "../utility/footer.php"; ?>


    <script type="module">

        import { initializeApp } from 'https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js';
        import { getAuth, signInWithPhoneNumber, RecaptchaVerifier } from 'https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js';

        const firebaseConfig = <?php echo json_encode($firebaseConfig); ?>;

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);

        // Create an instance of the Firebase Auth class
        const auth = getAuth(app);

        window.recaptchaVerifier = new RecaptchaVerifier(auth, 'sign-in-button', {
            'size': 'invisible',
            'callback': (response) => {
                // reCAPTCHA solved, allow signInWithPhoneNumber.
                console.log("Recaptcha solved");
            }
        });

        function isValidPhoneNumber(phoneNumber) {
            // remove dashes and whitespaces
            phoneNumber = phoneNumber.replace(/-|\s/g, "");
            // Use a regular expression to validate the phone number number may begin with + length may be 10 to 14 characters
            // + is optional
            const phoneRegex = /^[+]?\d{10,14}$/;
            return phoneRegex.test(phoneNumber);
        }

        function sendOTP() {
            var phoneNumber = document.getElementById('phoneNumber').value;

            // Validate the phone number
            if (!isValidPhoneNumber(phoneNumber)) {
                alert("Invalid phone number. Please enter a valid 10-digit phone number.");
                return;
            }

            // Add +91 if the user has entered a 10-digit number
            if (phoneNumber.length === 10 && phoneNumber.charAt(0) !== "+") {
                phoneNumber = "+91" + phoneNumber;
            }

            // Use Firebase Authentication API to send OTP
            signInWithPhoneNumber(auth, phoneNumber, window.recaptchaVerifier)
                .then((confirmationResult) => {
                    // SMS sent. Prompt user to enter the OTP
                    window.confirmationResult = confirmationResult;
                    console.log(confirmationResult);
                    console.log("OTP sent");
                    document.getElementById("phoneForm").style.display = "none";
                    document.getElementById("otpForm").style.display = "flex";
                })
                .catch((error) => {
                    // re render the widget
                    window.recaptchaVerifier.render().then((widgetId) => {
                        window.recaptchaWidgetId = widgetId;
                    });

                    console.error("Error sending OTP:", error);
                });
        }

        document.getElementById('sign-in-button').onclick = function () {
            window.recaptchaVerifier.render().then((widgetId) => {
                window.recaptchaWidgetId = widgetId;
                sendOTP();
            });
        };

        function verifyOTP() {
            var otp = document.getElementById('otp').value;

            // Use Firebase Authentication API to verify OTP
            var confirmationResult = window.confirmationResult;
            console.log(confirmationResult);
            confirmationResult.confirm(otp)
                .then((result) => {
                    // User signed in successfully.
                    // save user data to local storage
                    localStorage.setItem("user", JSON.stringify(result.user));

                    // fill the form
                    document.getElementById("phoneNo").value = result.user.phoneNumber;
                    document.getElementById("uid").value = result.user.uid;

                    // submit the form
                    document.getElementById("inv").submit();
                    
                })
                .catch((error) => {
                    console.error("Error verifying OTP:", error);

                    // Error occurred while confirming the OTP
                    // re render the widget
                    window.recaptchaVerifier.render().then((widgetId) => {
                        window.recaptchaWidgetId = widgetId;
                    });
                    
                    // alert and on click refresh the page
                    alert("Error verifying OTP. Please try again.");
                    window.location.reload();
                });
        }

        document.getElementById("submit").addEventListener("click", verifyOTP);

    </script>    
</body>
</html>
