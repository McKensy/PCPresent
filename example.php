<?php
    session_start();
    @$mid = $_SESSION['saved'];
    @$username = $_SESSION['username'];
    $activenav = 'index';
    if(!isset($username)){
        $username = 'Gast';
    }
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
            <div class="card-panel light-blue lighten-5">
            
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    </body>
</html>