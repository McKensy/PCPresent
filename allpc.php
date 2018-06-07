<?php
    session_start();
    include './pdo.php';
    @$username = $_SESSION['username'];
    unset($_SESSION['errormessage']);
    $activenav = 'index';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PCP - All PCs</title>
        <?php include './head.php'; ?>
    </head>
    <body class="grey darken-4">
        <?php include './navbar.php'; ?>
        <div class="container">
            <?php
                $sql = "SELECT c.name, c.description, c.picture, u.username FROM computer as c, user as u WHERE c.entrycreatorfk = u.uid";
                foreach ($pdo->query($sql) as $row) {
                    echo "<div class=\"card-panel col s12 m12 l12 center\">";
                    echo "<h3 class=\"center-align\">".$row['name']."</h3>";
                    echo "<h5 class=\"center-align\">".$row['description']."</h5>";
                    echo "<img class=\"center\" src=\"".$row['picture']."\" alt=\"./src/imgnotfound.jpg\" style=\"width: 80%;\">";
                    echo "<blockquote>Uploaded by: ".$row['username']."</blockquote></div>";
                    /*echo "<p>Date of refresh: ".date("d.m.Y H:i:s")."<p>";*/
                }
            ?>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    </body>
</html>