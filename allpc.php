<?php
    session_start();
    include './pdo.php';
    @$username = $_SESSION['username'];
    $activenav = 'index';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PCPresent</title>
        <script src="./script.js"></script>
        <!-- To track device-width for responsive design. -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Color: light-blue-->

    </head>
    <body class="grey darken-4">
        <?php include './navbar.php'; ?>
        <div class="container">
            <?php
                $sql = "SELECT c.name, c.description, c.picture, u.username FROM computer as c, user as u WHERE c.entrycreatorfk = u.uid";
                foreach ($pdo->query($sql) as $row) {
                    echo "<div class=\"card-panel col s12 m12 l12 left\" style=\"margin: 1%\">";
                    echo "<h3 class=\"center-align\">".$row['name']."</h3>";
                    echo "<h5 class=\"center-align\">".$row['description']."</h5>";
                    echo "<img src=\"".$row['picture']."\" alt=\"./src/imgnotfound.jpg\" style=\"width: 50%;\">";
                    echo "<blockquote>".$row['username']."</blockquote></div>";
                    /*echo "<p>Date of refresh: ".date("d.m.Y H:i:s")."<p>";*/
                }
            ?>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    </body>
</html>