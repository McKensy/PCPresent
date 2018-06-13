<?php
    session_start();
    include "./pdo.php";
    @$username = $_SESSION['username'];
    unset($_SESSION['errormessage']);
    $_SESSION['activenav'] = "home";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>PCP - Home</title>
        <?php include './head.php'; ?>
    </head>
    <body class="grey darken-4">
        <?php include './navbar.php'; ?>
        <div class="container">
            <div class="card-panel">
                <h3 class="center-align">Personal Computer Presenter</h3>
                <blockquote>Welcome to my PHP-Project PCP, short for Personal Computer Presenter. The Website provides a platform, to show other users your PC, the spezifications and maybe even the story behind it. ADD YOUR PC TODAY!!!11</blockquote>
                <h5>Featured PCs:<h5>
                <div class="slider">
                    <ul class="slides">
                        <?php
                            $sql = "SELECT c.name, c.picture, u.username FROM computer as c, users as u WHERE c.entrycreatorfk = u.uid  ORDER BY RAND() LIMIT 10";
                            foreach ($pdo->query($sql) as $row) {
                                echo "<li>";
                                echo "<img src=\"".$row['picture']."\">\n";
                                echo "<div class=\"caption left-align\">\n";
                                echo "<h2 style=\"text-shadow: -1.5px 0 black, 0 1.5px black, 1.5px 0 black, 0 -1.5px black;\">".$row['name']."</h3>\n";
                                echo "<h4 style=\"text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;\" class=\"light grey-text text-lighten-3\">".$row['username']."</h5>\n";
                                echo "</div>";
                                echo "</li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.slider').slider();
            });
        </script>
        <style>
            .slider .indicators .indicator-item.active{
                background-color: #03a9f4;
            }
        </style>
    </body>
</html>
