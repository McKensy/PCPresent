<?php
    session_start();
    include './pdo.php';
    if(isset($_POST["register"])) {
        $proof = "SELECT * FROM users WHERE username=?";
        $proofstatement = $pdo->prepare($proof);
        $proofstatement->execute(array($_POST['username']));
        if ($proofstatement->fetch() > 0) {
            $_SESSION['errormessage'] = "Username already exists!";
            header("location: ./login.php");
        }else{
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $registersql = "insert into users (username, password) values (?, ?)";
            $statement = $pdo->prepare($registersql);
            $statement->execute(array($_POST['username'], $password));
            $_SESSION['username'] = $_POST['username'];
            header("location: ./login-success.php");
            die("Login successful.");
        }
    }
    if(isset($_POST["login"])) {
        $username = $_POST['username'];
        $verifylogin = "select * from users where username = '$username'";
        $result = $pdo->query($verifylogin);
        $statement = $pdo->prepare($verifylogin);
        $statement->execute();
        while($row = $statement->fetch()) {
            if(password_verify($_POST['password'], $row['password'])){
                $_SESSION['username'] = $_POST['username'];
                header("location: ./login-success.php");
                die("Login successful.");
            }else {
                $_SESSION['errormessage'] = "Wrong Username or Password!";
                header("location: ./login.php");
            }
        }
        $_SESSION['errormessage'] = "Wrong Username or Password!";
        header("location: ./login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PCP - Login</title>
        <?php include './head.php'; ?>
    </head>
    <body class="grey darken-4">
    <?php include './navbar.php'; ?>
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
        <script>
            $(document).ready(function(){
                $('.sidenav').sidenav();
            });
        </script>
    </body>
</html>
