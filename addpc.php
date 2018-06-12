<?php
    session_start();
    include './pdo.php';
    @$username = $_SESSION['username'];
    $userid = (int)$_SESSION["userid"];
    $_SESSION['activenav'] = "addpc";
    if(!isset($_SESSION["userid"])) {
        $_SESSION['errormessage'] = "You need to Login or Register before adding a PC!";
        header("location: ./login.php");
    }
    if(isset($_POST["Submit"])) {
        $insertpcsql = "INSERT INTO `computer` (`cid`, `name`, `description`, `picture`, `entrycreatorfk`, `created`) VALUES (?, ?, ?, ?, ?, NOW());";
        $statement = $pdo->prepare($insertpcsql);
        $statement->execute(array(NULL, $_POST["pcname"], $_POST["pcdescription"], $_POST["pcpicture"], $userid));
        header("location: ./allpc.php");
        die("Entry successful.");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PCP - Add PC</title>
        <?php include './head.php'; ?>
    </head>
    <body class="grey darken-4">
        <?php include './navbar.php'; ?>
        <div class="container">
            <div class="card-panel">
            <h3 class="center">Add a Computer</h3>
                <form action="./addpc.php" method="post">
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" name="pcname" class="validate" id="pcname" maxlength="32" required/>
                        <label for="pcname">The name of your PC</label>
                    </div>
                    <div class="input-field col s6"> <!-- TODO: Upload picture and save it locally -->
                        <input type="text" name="pcpicture" class="validate" id="pcpicture" maxlength="192" required/>
                        <label for="pcpicture">Link to the picture</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea name="pcdescription" id="pcdescription" class="validate materialize-textarea" maxlength="2048" required/></textarea>
                        <label for="pcdescription">Description of your PC</label>
                    </div>
                </div>
                <blockquote> Note: Adding entry as <?php echo "$username"?></blockquote>
                <button class="btn waves-effect waves-light light-blue darken-1" type="Submit" name="Submit">Submit<i class="material-icons right">send</i></button>
                </form>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    </body>
</html> 
