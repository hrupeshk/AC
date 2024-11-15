<?php
require "../utility/header.php";
echo <<< _END
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="../style.css">
    <style>

        .soon {
            text-align: center;
        }

        .soon h1 {
            font-size: 50px;
            margin: 50px auto;
            padding: 30px;
            display: inline-block;
            background: linear-gradient(135deg, #6c5ce7, #ecf0f1);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: gradientText 2s ease-in-out infinite alternate;
        }

        @keyframes gradientText {
            0% {
                filter: hue-rotate(0deg);
            }
            100% {
                filter: hue-rotate(360deg);
            }
        }
    </style>
</head>
<body>
    <div class="soon">
        <h1>Coming Soon...</h1>
    </div>
</body>
</html>
_END;
require "../utility/footer.php";
?>
