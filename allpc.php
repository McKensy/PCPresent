<?php
    session_start();
    include './pdo.php';
    @$username = $_SESSION['username'];
    unset($_SESSION['errormessage']);
    $_SESSION['activenav'] = "allpc";
    if(isset($_POST["search"])) {
        $search = $_POST["search"];
        $sql = "SELECT c.name, c.description, c.picture, u.username, DATE_FORMAT(c.created, '%d.%m.%Y %H:%i') as created FROM computer as c, user as u WHERE c.entrycreatorfk = u.uid AND (c.name LIKE '%$search%' OR c.description LIKE '%$search%' OR u.username LIKE '%$search%')";
    } else {
        $sql = "SELECT c.name, c.description, c.picture, u.username, DATE_FORMAT(c.created, '%d.%m.%Y %H:%i') as created FROM computer as c, user as u WHERE c.entrycreatorfk = u.uid";     
    }
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
            <form action="./allpc.php" method="post"> <!-- TODO: Filters and Favorites-->
                <div class="input-field">
                <input id="search" type="search" name="search"  placeholder="Searching something?" maxlength="16" required>
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
                </div>
            </form>
            <?php   
            if (isset($search)){
                    echo "<blockquote>Searching for \"$search\"";
                    echo '<a class="waves-effect waves-light blue btn right" href="allpc.php"><i class="material-icons right">settings_backup_restore</i>Reset Filter</a>';
                }
              ?>
        </div>
            <?php
                $check = $pdo->prepare($sql);
                $check->execute();
                if ($check->fetch() < 1) {
                    echo "<div class=\"card-panel center-align\"><h3>No search result... :(</h3></div>";
                }else{
                    foreach ($pdo->query($sql) as $row) {
                        echo "<div class=\"card-panel\">";
                        echo "<h3 class=\"center-align\">".$row['name']."</h3>";
                        echo '<div class="row">';
                        echo '<div class="col s12 m8 l6">';
                        echo "<p class=\"left-align\">".$row['description']."</p>";
                        echo '</div>';
                        echo '<div class="col s12 m4 l6">';
                        echo "<img class=\"right materialboxed\" src=\"".$row['picture']."\" alt=\"Image of the PC not found.\" data-caption=\"".$row['name']."\">";
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="row">';
                        echo '<div class="col s8 m8 l8">';
                        echo "<blockquote>".$row['username']." at ".$row['created']."</blockquote>";
                        echo '</div>';
                        #echo '<div class="col s4 m4 l4">';
                        #echo '<a class="btn-floating btn-large waves-effect waves-light blue right"><i class="large material-icons">favorite_border</i></a>';
                        #echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        /*echo "<p>Date of refresh: ".date("d.m.Y H:i:s")."<p>";*/
                    }
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
<!-- TODO: button to go all the way up, search function with word and order-->