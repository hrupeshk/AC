<!-- Gallery.php -->

<?php
$BASE_URL = "http://localhost/AlumniConnect";
$SERVER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/AlumniConnect"; // Use the server path
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="gallery.css">
</head>
<body>
    <?php require "../utility/header.php"; ?>

    <div class="title">
        <h2>Memories</h2>
    </div>
    <div class="Potrait">

        <?php
        // Define the folder path
        $folderPath = "$SERVER_PATH/photos/alumni-photos";

        // Get all files in the folder
        $files = scandir($folderPath);

        if ($files !== false) {  // Check if scandir was successful
            // Filter out non-image files
            $imageFiles = array_filter($files, function ($file) {
                $fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                return in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
            });

            // Display images and captions
            foreach ($imageFiles as $imageFile) {
                $imagePath = $folderPath . '/' . $imageFile;  // Concatenate folder path with file name
                ?>
                <div class="Sub_Potrait">
                    <img src="<?php echo $BASE_URL . '/photos/alumni-photos/' . $imageFile; ?>" alt="">
                    <h4>Event: <?php echo date('d/m/Y', filemtime($imagePath)); ?></h4>
                </div>
                <?php
            }
        } else {
            echo "Failed to read the directory.";
        }
        ?>

    </div>

    <?php require "../utility/footer.php"; ?>
</body>
</html>
