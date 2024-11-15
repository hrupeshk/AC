<!--Receive the form data -->
<?php
    $phoneNumber = $uid = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // if isset($_POST["name"]) is true, then assign $_POST["name"] to $name, else assign null
        $phoneNumber = isset($_POST["phoneNumber"]) ? $_POST["phoneNumber"] : '';
        $uid = isset($_POST["uid"]) ? $_POST["uid"] : '';
    };
    if (empty($phoneNumber) || empty($uid)) {
        header("Location: auth.php?message=First verify your phone number.");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./alumniForm.css">
    <link rel="stylesheet" href="../style.css">
    <title>Alumni Registration</title>
</head>
<body>
    <!-- Include header.php-->
    <?php require "../utility/header.php"; ?>

    <section class="container">

        <div class="heading">
            <h1>Alumni Registration</h1>
        </div>

        <div class="description">
            <p>Embark on a journey to immortalize your legacy! The Alumni Registration portal beckons, promising an exclusive sanctuary for connection and recognition. Unleash memories, forge bonds, and become a vital chapter in our extraordinary story. Your unique Alumni ID awaits—unlock the door to a world of extraordinary experiences. Seize the moment and register now to weave your narrative into the rich tapestry of our esteemed alumni community.</p>
        </div>

        <form action="alumniRegistration.php" method="post" enctype="multipart/form-data">

            <div class="inputContainer">
                <div class="data-input">

                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Name" required> <br>
            
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" required> <br>
            
                    <label for="programme">Programme</label>
                    <select name="programme" id="programme" required>
                        <option value="" disabled selected>Select your Programme</option>
                        <option value="CSB">B.Tech</option>
                        <option value="CSM">MCA</option>
                        <option value="CSI">M.Tech(IT)</option>
                        <option value="CSE">M.Tech(CSE)</option>
                        <option value="PhD">PhD</option>
                    </select> <br>
            
                    <label for="passoutYear">Graduating Year</label >
                    <select name="passoutYear" id="yearDropdown" required>
                        <option value="" disabled selected>Select your Graduating Year</option>
                    </select><br>
            
                    <label for="linkedin">Linkedin Profile</label>
                    <input type="text" id="linkedin" name="linkedin" placeholder="Linkedin Profile"> <br>
            
                    <label for="note">Note (optional)</label>
                    <input type="text" id="note" name="note" placeholder="Note"> <br>

                    <input type="hidden" name="phoneNumber" value="<?php echo $phoneNumber; ?>" required>
                    <input type="hidden" name="uid" value="<?php echo $uid; ?>" required>


                </div>
        
                <div class="photo-input">
                    <div>
                        <img src="./images/user-avatar.svg" alt="Image Preview" id="imagePreview">
                    </div>
                    <input type="file" name="image" onchange="previewImage(event)" accept="image/*" />
                </div>
            </div>
    
            <div class="submit">
                <input type="submit" value="Submit">
            </div>
    
        </form>

        <!-- <div class="extraBtn">
            <button>Reissue ID</button>
            <button>Contact Us</button>
        </div> -->

    </section>

    <!-- Include footer.php-->
    <?php require "../utility/footer.php"; ?>

    <script src="./alumniForm.js"></script>
    
</body>
</html>