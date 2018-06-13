<?php
session_start();
include './pdo.php';
$username = $_SESSION["username"];
$getuserid = "select uid from users where username = '$username';";
foreach ($pdo->query($getuserid) as $row) {
    $_SESSION["userid"] = (int)$row['uid'];
}
header("location: ./index.php");
die("Login successful.");
?>
