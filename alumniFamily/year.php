<?php

  require "../utility/header.php"; 

  echo <<<_END

  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Select Year</title>
      <link rel="stylesheet" href="year.css">
      <link rel="stylesheet" href="../style.css">

    </head>
    <body>

      <section class="container">
        <div class="heading">
          <!--Dynamic Heading for the selected programme-->
          <h1 id="programHeading"></h1>
        </div>

        <div class="subHeading">
          <h4>
            <a href="./programme.php" id="select-degree">Programme</a> >> Select
            Year
          </h4>
        </div>

          <!-- Container for year selection options -->
          <div id="yearOptionsContainer" class="yearContainer btn">
              
          </div>
      
      </section>

      <script src="./year.js"></script>
    </body>
</html>

_END;
 require "../utility/footer.php";
?>