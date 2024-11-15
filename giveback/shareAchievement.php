<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share Achievement</title>
    <link rel="stylesheet" href="exp1.css">
    <link rel="stylesheet" href="../style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <?php require "../utility/header.php"; ?>

    <div class="title">
        <h2>Share Achievement</h2>
    </div>
    <form id="achievementForm" action="shareAchievementBackend.php" method="post" enctype="multipart/form-data">
        <div class="inputContainer">
            <div class="data-input">
                <div class="Alignment">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required> <br>
                </div>
                <div class="Alignment">
                    <label for="alumni_id" >Alumni ID</label>
                    <input type="text" id="alumni_id" name="alumni_id" placeholder="Enter your Alumni ID"  required> <br>
                    <span id="alumni_id_status"></span>
                </div>  
                <div class="Alignment">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required> <br>
                </div> 
                <div class="Alignment">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" placeholder="Enter the achievement title" required> <br>
                </div> 
                <div class="Alignment">
                    <label for="Description">Description</label>
                    <input type="text" id="description" name="description" placeholder="Enter a brief description" required> <br>
                </div>
            </div>
        </div>

        <div class="submit">
            <input type="submit" id="submitBtn" value="Submit" disabled>
        </div>
    </form> 

    <?php require "../utility/footer.php"; ?>
    <script src="./Check.js"></script>
</body>
</html>
