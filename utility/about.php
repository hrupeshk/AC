<!-- About Alumni Portal page -->

<?php $BASE_URL = "http://localhost/AlumniConnect"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>About Alumni Portal</title>
    <link rel="stylesheet" href="about.css">
</head>
<body>
    <!-- Include header.php-->
    <?php require "../utility/header.php"; ?>

    <section class="container">

        <div class="heading">
            <h1>TU CSE Alumni Connect Portal</h1>
        </div>

        <div class="description">
            <p>Welcome to our Alumni Portal, a dynamic platform designed to foster connections, celebrate achievements, and facilitate meaningful contributions to the institution that shaped your journey. We take pride in building a robust bridge between the past and the present, connecting alumni with their alma mater and providing a space to share experiences, opportunities, and successes.</p>
        </div>

        <div class="key-features">
            <h2>Key Features:</h2>
            <ul>
                <li><span>Alumni Registration:</span> Obtain a unique Alumni ID by registering on our portal, becoming an integral part of our alumni community.</li>
                <li><span>Achievement Sharing:</span> Share your successes, milestones, and achievements with your fellow alumni and inspire the upcoming generations.</li>
                <li><span>Opportunity Sharing:</span> Contribute to the growth of your alma mater by posting and discovering job opportunities, internships, and collaborations.</li>
                <li><span>College Contributions:</span> Give back to the college community by providing valuable insights, mentorship, and support to current students and recent graduates.</li>
                <li><span>Event Updates:</span> Stay informed about upcoming alumni activities, events, reunions, and networking opportunities.</li>
            </ul>
        </div>

        <div class="mission-vision">
            <h2>Our Mission and Vision:</h2>
            <p>Our mission is to create a vibrant and engaged community of alumni who actively contribute to the growth and success of our alma mater. We envision a platform where connections thrive, knowledge is shared, and each graduate plays a significant role in shaping the future of our college.</p>
        </div>

        <div class="why-join">
            <h2>Why Join Our Alumni Portal?</h2>
            <h4>Joining our Alumni Portal offers a myriad of benefits:</h4>
            <ul>
                <li><span>Networking:</span> Connect with fellow alumni, expand your professional network, and discover new opportunities.</li>
                <li><span>Mentorship:</span> Provide mentorship to current students and receive guidance from experienced alumni in your field.</li>
                <li><span>Stay Updated:</span> Receive regular updates on college news, events, and the achievements of your peers.</li>
                <li><span>Contribution:</span> Give back to the college community by sharing your experiences, insights, and expertise.</li>
                <li><span>Reconnect:</span> Reconnect with old friends, classmates, and professors, fostering a sense of community and belonging.</li>
            </ul>
        </div>

        <div class="call-to-action">
            <h4>Ready to embark on this exciting journey?</h4> 
            <h4>Register now and become a vital part of our thriving alumni community.</h4> 
            <h4>Your unique Alumni ID awaits!</h4>
            <a href="<?php echo $BASE_URL ?>/alumniRegistration/alumniForm.php">
                <button class="cta-button">Register Now</button>
            </a>
        </div>

    </section>

    <!-- Include footer.php-->
    <?php require "../utility/footer.php"; ?>

</body>
</html>
