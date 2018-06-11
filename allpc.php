<?php
    session_start();
    include './pdo.php';
    @$username = $_SESSION['username'];
    unset($_SESSION['errormessage']);
    $_SESSION['activenav'] = "allpc";
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
        <div class="nav-wrapper card-panel">
            <form>
                <div class="input-field">
                <input id="search" type="search" required>
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
                </div>
            </form>
        </div>
            <?php
                $sql = "SELECT c.name, c.description, c.picture, u.username, DATE_FORMAT(c.created, '%d.%m.%Y %H:%i') as created FROM computer as c, user as u WHERE c.entrycreatorfk = u.uid";
                foreach ($pdo->query($sql) as $row) {
                    echo "<div class=\"card-panel col s12 m12 l12 \">";
                    echo "<h3 class=\"center-align\">".$row['name']."</h3>";
                    echo '<div class="row">';
                    echo '<div class="col s12 m8 l6">';
                    echo "<p class=\"left-align\">".$row['description']."</p>";
                    echo '</div>';
                    echo '<div class="col s12 m4 l6">';
                    echo "<img class=\"right materialboxed\" src=\"".$row['picture']."\" alt=\"Image of the PC not found.\" data-caption=\"".$row['name']."\">";
                    echo '</div>';
                    echo '</div>';
                    echo "<blockquote>".$row['username']." at ".$row['created']."</blockquote></div>";
                    /*echo "<p>Date of refresh: ".date("d.m.Y H:i:s")."<p>";*/
                }
            ?>
        </div>
        <style>
        img {
            max-width: 100%;
            max-height: 500px;
            border: black solid 1px;
            box-shadow: 3px 3px 20px 2px rgba(0,0,0,0.71);
        }
        blockquote {
            border-left: 5px solid #03a9f4;
        }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.materialboxed').materialbox();
            });
        </script>
    </body>
</html>