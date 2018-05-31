<?php
    session_start();
    include './pdo.php';
    /*if ($pdo->connect_error) {
        die("Connection failed: " . $pdo->connect_error);
    }*/
    if(isset($_POST["register"])) {
        $proof = "SELECT * FROM user WHERE username=?";
        $proofstatement = $pdo->prepare($proof);
        $proofstatement->execute(array($_POST['username']));
        if ($proofstatement->fetch() > 0) {
            $_SESSION['errormessage'] = "Username already exists!";
            header("location: ./login.php");
        }else{
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $registersql = "insert into user (username, password) values (?, ?)";
            $statement = $pdo->prepare($registersql);
            $statement->execute(array($_POST['username'], $password));
            $_SESSION['username'] = $_POST['username'];
            header("location: ./index.php");
            die("Login successful.");
        }
    }
    if(isset($_POST["login"])) {
        $username = $_POST['username'];
        $verifylogin = "select * from user where username = '$username'";
        $result = $pdo->query($verifylogin);
        $statement = $pdo->prepare($verifylogin);
        $statement->execute();
        while($row = $statement->fetch()) {
            if(password_verify($_POST['password'], $row['password'])){
                $_SESSION['username'] = $_POST['username'];
                header("location: ./index.php");
                die("Login successful.");
            }else {
                $_SESSION['errormessage'] = "Wrong Username or Password!";
                header("location: ./login.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Font awesome link-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
      <title>Movie2k</title>
    </head>
    <body class="grey darken-4">
    <ul id="dropdown-desktop" class="dropdown-content light-blue">
        <li><a class="white-text" href="index.php">Home</a></li>
        <li><a class="white-text" href="allpc.php">All Computers</a></li>
        <li><a class="white-text" href="addpc.php">Add a Computer</a></li>
    </ul>
    <nav>
        <div class="nav-wrapper light-blue">
            <a href="./index.php" class="brand-logo center" style="margin-left:10px"><i class="material-icons">desktop_windows</i>PCP</a>
            <a href="#!" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <?php if(!isset($username)){echo "<a class=\"white-text\" href=\"login.php\"> Login";}else{echo "<a class=\"white-text\"href=\"logout.php\">Logout</a>";}?>
            <ul class="left hide-on-med-and-down">
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown-desktop"><?php if(!isset($username)){echo "Guest";}else{echo "ayy $username";} ?> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </div>
    </nav>
    <ul class="sidenav light-blue" id="mobile-demo">
        <li><a class="white-text" href="index.php">Home</a></li>
        <li><a class="white-text" href="allpc.php">All Computers</a></li>
        <li><a class="white-text" href="addpc.php">Add a Computer</a></li>
    </ul>
        <div class="container">
            <div class="card-panel">
                <h3 class="center">Login / Registration</h3>
                <form action="./login.php" method="post">
                    <div class="row">
                        <div class="col m2 l3 left"></div>
                    <div class="input-field col s12 m4 l3">
                        <input placeholder="Username" type="text" name="username" class="validate" maxlength="16" required>
                    </div>
                    <div class="input-field col s12 m4 l3">
                        <input placeholder="Enter Password" type="password" name="password" class="validate"  maxlength="64" required>
                    </div>
                        <div class="col m2 l3 right"></div>
                    </div>
                    <div class="center">
                        <button class="btn waves-effect waves-light light-blue darken-1" type="Submit" name="login" value="Login">Login</button>
                        <button class="btn waves-effect waves-light light-blue darken-1" type="Submit" name="register" value="Register">Register</button>
                    </div>
                </form>
                <?php
                if(isset($_SESSION['errormessage'])){
                    echo "<p class=\"center\" style=\"font-size: 1.3em;\">".$_SESSION['errormessage']."</p>";
                }
                ?>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $(".dropdown-trigger").dropdown();
                $('.sidenav').sidenav();
            });
        </script>
    </body>
</html>
