<?php
    session_start();
    include './pdo.php';
    @$username = $_SESSION['username'];
    $userid = (int)$_SESSION["userid"];
    if(!isset($_SESSION["userid"])) {
        $_SESSION['errormessage'] = "You need to Login or Register before adding a PC!";
        header("location: ./login.php");
    }
    if(isset($_POST["Submit"])) {
        $insertpcsql = "INSERT INTO `computer` (`cid`, `name`, `description`, `picture`, `entrycreatorfk`) VALUES (?, ?, ?, ?, ?);";
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
                  <p>Name:    <input type="text" name="pcname" class="validate" placeholder="The name of your computer" maxlength="64" required/> </p>
                  <p>Description:    <input type="text" name="pcdescription" class="validate" placeholder="The description of your computer" maxlength="512" required/> </p>
                  <p>Link to a Picture:    <input type="text" name="pcpicture" class="validate" placeholder="for example: https://i.imgur.com/cwdHAq2.png" maxlength="192" required/> </p>
                  <blockquote> Note: Adding entry as <?php echo "$username $userid"?> </blockquote>
                  <button class="btn waves-effect waves-light light-blue darken-1" type="Submit" name="Submit">Submit<i class="material-icons right">send</i></button>
              </form>
          </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    </body>
</html>
