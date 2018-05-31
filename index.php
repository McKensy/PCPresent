<?php
    session_start();
    @$mid = $_SESSION['saved'];
    @$username = $_SESSION['username'];
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
                <p> make showcase </p>
                <img src="" alt="">
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    </body>
</html>