<!--index.php-->
<?php
$BASE_URL = "http://localhost/AlumniConnect";
$SERVER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/AlumniConnect"; // Use the server path
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TU Alumni Connect</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php require "./utility/header.php"; ?>
     <!-- Message Section -->

     <div class="message-container">
        <h4 class="m1">Alumni Connect <br>Computer Science and Engineering <br> Tezpur University</h4>
        <h2 class="m2">Together Again!</h2>
        <p class="m3">Welcome back, brilliant minds of 0s and 1s! As CSE alumni, you're the architects of the digital future. Reconnect, reminisce, and inspire. Together, let's code unforgettable memories!</p>
    </div>

    

    <!-- Carasoul -->

    <div class="slideshow-container">

        <div class="mySlides fade">
            <img src="./photos/WhatsApp Image 2023-10-23 at 10.38.56 PM.jpeg">
        </div>

        <!-- <div class="mySlides fade">
            <img src="./photos/WhatsApp Image 2023-10-23 at 10.38.57 PM (1).jpeg">
        </div> -->

        <div class="mySlides fade">
            <img src="./photos/WhatsApp Image 2023-10-23 at 10.38.57 PM.jpeg">
        </div>

        <div class="mySlides fade">
            <img src="./photos/WhatsApp Image 2023-10-23 at 10.44.00 PM.jpeg">
        </div>

        <div class="mySlides fade">
            <img src="./photos/WhatsApp Image 2023-10-23 at 10.44.02 PM.jpeg">
        </div>

    </div>

   

    <!---Alumni Achievement-->

    <div class="title">
        <h2>Alumni Achievement</h2>
    </div>

    <div class="Alumni-Achievement">

        <div class="Achievement-box">

            <div class="potrait">
                <img src="./photos/alumni achi.jpg" alt="">
            </div>

            <div class="Introduction">
                <h4>loreum ipsum lora </h4>
                <h5>first proze in sports</h5>
                <p>Tezpur University student excels, receiving top sports prize from the President of India. A testament to her dedication and talent in both academics and athletics. Congratulations on this outstanding achievement, inspiring peers nationwide!</p>
            </div>

        </div>

        <div class="Achievement-box">

            <div class="potrait">
                <img src="./photos/alumni achi2.webp" alt="">
            </div>

            <div class="Introduction">
                <h4>loreum ipsum lora </h4>
                <h5>first proze in sports</h5>
                <p>Tezpur University student excels, receiving top sports prize from the President of India. A testament to her dedication and talent in both academics and athletics. Congratulations on this outstanding achievement, inspiring peers nationwide!</p>
            </div>

        </div>

        <div class="Achievement-box">

            <div class="potrait">
                <img src="./photos/alumni achi.jpg" alt="">
            </div>

            <div class="Introduction">
                <h4>loreum ipsum lora </h4>
                <h5>first proze in sports</h5>
                <p>Tezpur University student excels, receiving top sports prize from the President of India. A testament to her dedication and talent in both academics and athletics. Congratulations on this outstanding achievement, inspiring peers nationwide!</p>
            </div>

        </div>
        
        <div class="Achievement-box">

            <div class="potrait">
                <img src="./photos/alumni achi.jpg" alt="">
            </div>

            <div class="Introduction">
                <h4>lo::::::::::: </h4>
                <h5>first proze in sports</h5>
                <p>orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived.</p>
            </div>

        </div>

    </div>

    <!--GiveBack section-->

    <div class="title">
        <h2>GiveBack</h2>
    </div>

    <div class="GiveBack-Container">
       
        <div class="GB Achievement">
        <a href="<?php echo $BASE_URL ?>/giveback/shareAchievement.php" id="Bridge">
            <div class="card_img">
                <img src="./photos/1568629126383.jpg" alt="">
            </div>
            <div class="Introduction">
                <h3>Share Achievement</h3>
                <p>"Alumni Milestones: Inspiring Successes, Guiding Futures. Share your achievements to inspire the next generation of innovators in our Computer Science community."</p>
            </div>
            </a>
        </div>


        <div class="GB Mentor">
        <a href="<?php echo $BASE_URL ?>/giveback/mentor.php" id="Bridge">
            <div class="card_img">
                <img src="./photos/what-is-mentoring1-square.jpg" alt="">
            </div>
            <div class="Introduction">
                <h3>Be A Mentor</h3>
                <p>"Discover the Power of Mentorship: Our alumni stand ready to guide, support, and inspire the students, fostering growth and success in their academic and professional journeys." </p>
            </div>
            </a>
        </div>


        <div class="GB opportunity">
        <a href="<?php echo $BASE_URL ?>/giveback/shareOpportunity.php" id="Bridge">
            <div class="card_img">
                <img src="./photos/opportunity-vector-icon-symbol-creative-sign-from-crm-icons-collection-filled-flat-opportunity-icon-for-computer-and-mobile-W1GTA9.jpg" alt="">
            </div>
            <div class="Introduction">
                <h3>Share opportunity</h3>
                <p>"Empowering Futures: Our alumni generously share placement, internship, and career opportunities, ensuring students access invaluable pathways to success in the dynamic tech industry." </p>
            </div>
            </a>
        </div>


        <div class="GB PayBack">
        <a href="<?php echo $BASE_URL ?>/utility/comingSoon.php" id="Bridge">
            <div class="card_img">
                <img src="./photos/pay.png" alt="">
            </div>
            <div class="Introduction">
                <h3>PayBack</h3>
                <p>"Pay It Forward: Alumni contribute to organizing enriching webinars, memorable parties, and valuable resources, fostering a vibrant community and supporting future generations."</p>
            </div>
            </a>
        </div>


    </div>

    <!----Events-->

    <div class="title">
        <h2>UpComing Events</h2>
    </div>
    <div class="UP Events">
        <!-- <p>Peek at some alumni events happening just around the corner.</p> -->
        <div class="Event_card">
            <div class="Event-img">
                <img src="./photos/download (1).jpg" alt="Data Science">
            </div>
            <div class="Introduction">
                <h3>Data Science</h3>
                <h5>"Data is the new oil, but data science is the refinery that extracts value from it."</h5>
                <p>Venue: KBR Auditorium <br> Date:18/11/2035 <br> Time: - 6:30pm</p>
            </div>

        </div>

        <div class="Event_card">
            <div class="Event-img">
                <img src="./photos/download (1).jpg" alt="Data Science">
            </div>
            <div class="Introduction">
                <h3>Data Science</h3>
                <h5>"Data is the new oil, but data science is the refinery that extracts value from it."</h5>

                <p>Venue: KBR Auditorium <br> Date:18/11/2035 <br> Time: - 6:30pm
                </p>
            </div>

        </div>
        <div class="Event_card">
            <div class="Event-img">
                <img src="./photos/download (1).jpg" alt="Data Science">
            </div>
            <div class="Introduction">
                <h3>Data Science</h3>
                <h5>"Data is the new oil, but data science is the refinery that extracts value from it." </h5>

                <p>Venue: KBR Auditorium <br> Date:18/11/2023 <br> Time: - 6:30pm
                </p>
            </div>

        </div>

        <div class="Event_card">
            <div class="Event-img">
                <img src="./photos/download (1).jpg" alt="Data Science">
            </div>
            <div class="Introduction">
                <h3>Data Science</h3>
                <h5>"Data is the new oil, but data science is the refinery that extracts value from it." </h5>
                <p>Venue: KBR Auditorium <br> Date:18/11/2023 <br> Time: - 6:30pm
                </p>
            </div>

        </div>

    </div>
    <div class="More_button">
        <h3><a href="<?php echo $BASE_URL ?>/utility/comingSoon.php">More..</a></h3>
    </div>

    <!--Gallery-->

    <div class="title">
        <h2>Gallery</h2>
    </div>

    <div class="gallery-Container">
        <?php
        // Determine the count based on the range
        $count = 8; // Default count

        // Get the list of files in the alumni-photos folder
        $photosFolder = $SERVER_PATH . "/photos/alumni-photos";
        $photoFiles = scandir($photosFolder);
        $photoFiles = array_diff($photoFiles, array('.', '..')); // Remove '.' and '..' from the list

        // Get the most recent photos
        $recentPhotos = array_slice(array_reverse($photoFiles), 0, $count);

        // Display the images
        foreach ($recentPhotos as $photo) {
            echo '<img src="' . $BASE_URL . '/photos/alumni-photos/' . $photo . '" alt="">';
        }
        ?>
    </div>
    <div class="More_button">
        <h3><a href="<?php echo $BASE_URL ?>/gallery/Gallery.php">More..</a></h3>
    </div>

    <!--Footer-->
    <?php require "./utility/footer.php"; ?>

    <!--JavaScript-->
    <script src="./utility/carasoul.js"></script>

</body>
</html>