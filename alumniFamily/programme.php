<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Programme</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="programme.css">

</head>
<body>

    <?php require "../utility/header.php"; ?>

    <section class="container">

        <div class="heading">
            <h1>Alumni Family</h1>
        </div>

        <div class="subHeading">
            <h4>Select Programme</h4>
        </div>

        <div class="options">
            <button class="item" onclick="navigateToYearPage('btech')">
                <p class="btnTitle">B.Tech</p>
                <p class="count"><span id="CSB_count"></span> Members</p>
            </button>
            <button class="item" onclick="navigateToYearPage('mca')">
                <p class="btnTitle">MCA</p>
                <p class="count"><span id="CSM_count"></span> Members</p>
            </button>
            <button class="item" onclick="navigateToYearPage('mtechit')">
                <p class="btnTitle">M.Tech (IT)</p>
                <p class="count"><span id="CSI_count"></span> Members</p>
            </button>
            <button class="item" onclick="navigateToYearPage('mtechcse')">
                <p class="btnTitle">M.Tech (CSE)</p>
                <p class="count"><span id="CSE_count"></span> Members</p>
            </button>
            <button class="item" onclick="navigateToYearPage('phd')">
                <p class="btnTitle">PhD</p>
                <p class="count"><span id="PhD_count"></span> Members</p>
            </button>
        </div>

    </section>

    <?php require "../utility/footer.php"; ?>

<script src="programme.js"></script>
    
</body>
</html>