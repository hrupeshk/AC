<!-- Header -->

<?php $BASE_URL = "http://localhost/AlumniConnect"; ?>

<!-- Navigation Bar -->

<div class="Navbar">
    <div class="nav-log">
        <a href="<?php echo $BASE_URL ?>/index.php">
            <img class="Web_logo" src="<?php echo $BASE_URL ?>/photos/tulogo.png" alt="">
        </a>
        <h1 class="TopHeader"><a href="<?php echo $BASE_URL ?>/index.php">Alumni Connect</a></h1>
    </div>

    <!-- Nav Btn -->

    <ul class="nav-btn"> 
        <li class="active1"><a href="#">GiveBack</a>
            <div class="sub-menu-1">
                <ul>
                    <li><a href="<?php echo $BASE_URL ?>/giveback/shareAchievement.php">Share Achievement</a></li>
                    <li><a href="<?php echo $BASE_URL ?>/giveback/mentor.php">Be A Mentor</a></li>
                    <li><a href="<?php echo $BASE_URL ?>/giveback/shareOpportunity.php">Share opportunity</a></li>
                    <li><a href="<?php echo $BASE_URL ?>/utility/comingSoon.php">PayBack</a></li>
                </ul>
            </div>
        </li>
        <li><a href="#">Alumni+</a>
            <div class="sub-menu-1">
                <ul>
                    <li><a href="<?php echo $BASE_URL ?>/utility/comingSoon.php">Alumni Achievement</a></li>
                    <li><a href="<?php echo $BASE_URL ?>/alumniFamily/programme.php">Alumni Family</a></li>
                </ul>
            </div>
        </li>
        <li><a href="<?php echo $BASE_URL ?>/gallery/gallery.php">Gallery</a></li>
        <li><a href="#">Events</a>
            <div class="sub-menu-1">
                <ul>
                    <li><a href="<?php echo $BASE_URL ?>/utility/comingSoon.php">UpComing/past Events</a></li>
                    <li><a href="<?php echo $BASE_URL ?>/utility/comingSoon.php">Event Committee</a></li>
                    <li><a href="<?php echo $BASE_URL ?>/utility/comingSoon.php">Reunion</a></li>
                </ul>
            </div>
        </li>
        <li><a href="#">Service</a>
            <div class="sub-menu-1">
                <ul>
                    <li><a href="<?php echo $BASE_URL ?>/alumniRegistration/auth.php">Alumni Registration</a></li>
                    <li><a href="<?php echo $BASE_URL ?>/utility/comingSoon.php">Transcript</a></li>
                </ul>
            </div>
        </li>
        <li><a href="#">About</a>
            <div class="sub-menu-1">
                <ul>
                    <li><a href="<?php echo $BASE_URL ?>/utility/about.php">About Us</a></li>
                    <li><a href="<?php echo $BASE_URL ?>/admin/admin.php">Admin</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
