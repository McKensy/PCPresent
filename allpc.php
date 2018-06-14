<?php
    session_start();
    include './pdo.php';
    @$username = $_SESSION['username'];
    unset($_SESSION['errormessage']);
    $_SESSION['activenav'] = "allpc";
    if(isset($_POST["Submit"])) {
        $search = $_POST["keyword"];
        $sql = "SELECT c.name, c.description, c.picture, u.username, DATE_FORMAT(c.created, '%d.%m.%Y %H:%i') as created FROM computer as c, users as u WHERE c.entrycreatorfk = u.uid AND (c.name LIKE '%$search%' OR c.description LIKE '%$search%' OR u.username LIKE '%$search%')";
        if(isset($_POST['sort'])){
            $sql .= $_POST['sort'];
        }
    } else {
        $sql = "SELECT c.name, c.description, c.picture, u.username, DATE_FORMAT(c.created, '%d.%m.%Y %H:%i') as created FROM computer as c, users as u WHERE c.entrycreatorfk = u.uid";
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
            <form action="./allpc.php" method="post">
                <?php if (!isset($search)){echo '<br /><br />';}?>
                <div class="row">
                    <div class="input-field col s12 m7 l7">
                        <input id="keyword" type="search" name="keyword"  placeholder="Searching something? Enter one keyword" maxlength="16">
                        <label class="label-icon" for="keyword"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                    <div class="input-field col s9 m4 l4">
                        <select name="sort">
                            <option value="" disabled selected>Sort by...</option>
                            <option value=" ORDER BY c.created DESC">Newest</option>
                            <option value=" ORDER BY c.created ASC">Oldest</option>
                            <option value=" ORDER BY c.name ASC">PC Name A-Z</option>
                            <option value=" ORDER BY c.name DESC">PC Name Z-A</option>
                            <option value=" ORDER BY u.username ASC">Username A-Z</option>
                            <option value=" ORDER BY u.username DESC">Username Z-A</option>
                        </select>
                    </div>
                    <div class="input-field col s3 m1 l1">
                        <button class="waves-effect waves-light blue btn" type="Submit" name="Submit"><i class="material-icons">search</i></button>
                    </div>
                </div>
                <?php
                if (isset($search)){
                        echo "<blockquote>Searching for \"$search\"";
                        echo '<a class="waves-effect waves-light blue btn right" href="allpc.php"><i class="material-icons right">settings_backup_restore</i>Reset Filter</a></blockquote>';
                    }
                  ?>
            </form>
        </div>
            <?php
                $check = $pdo->prepare($sql);
                $check->execute();
                if ($check->fetch() < 1) {
                    echo "<div class=\"card-panel center-align\"><h3>No search result... :(</h3></div>";
                }else{
                    foreach ($pdo->query($sql) as $row) {
                        echo "<div class=\"card-panel\">";
                        echo "<h5 class=\"center-align\">".$row['name']."</h5>";
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
        <script>
            $(document).ready(function(){
                $('.materialboxed').materialbox();
                $('select').formSelect();
            });
        </script>
    </body>
</html>
<!-- TODO: button to go all the way up, search function with word and order-->
