<!-- paybackForm.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayBack</title>
    <link rel="stylesheet" href="./exp1.css">
    <link rel="stylesheet" href="../style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<?php require "../utility/header.php"; ?>

<div class="title">
    <h2>PayBack</h2>
</div>
<form action="paybackBackend.php" method="post" enctype="multipart/form-data">

    <div class="inputContainer">
        <div class="data-input">
            <div class="Alignment">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required> <br>
            </div>
            <div class="Alignment">
                <label for="alumni_id">Alumni ID</label>
                <input type="text" id="alumni_id" name="alumni_id" placeholder="Enter your Alumni ID" required> <br>
                <span id="alumni_id_status"></span>
            </div>  
            <div class="Alignment">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required> <br>
            </div> 
            <div class="Alignment">
                <label for="transaction_id">Transaction Id</label>
                <input type="text" name="transaction_id" placeholder="Enter the transaction_id" required> <br>
            </div> 
            <div class="Alignment"> 
                <label>Attach any Proof</label> 
                <input type="file" name="attachment" accept=".pdf, .doc, .docx, .jpg, .jpeg, .png, .gif" required>  
            </div>
            <div class="Alignment">
                <label for="note">Note</label>
                <input type="text" id="description" name="note" placeholder="Enter a brief description"> <br>
            </div>
        </div>
    </div>

    <div class="photo-input">
        <img src="../photos/R.png" alt="Image Preview">     
    </div> 

    <div class="submit">
        <input type="submit" id="submitBtn" value="Submit" disabled>
    </div>
</form> 

<?php require "../utility/footer.php"; ?>

<script src="check.js"></script>
</body>
</html>
