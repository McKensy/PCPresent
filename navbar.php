<!-- Dropdown Structure -->
<div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper light-blue">
        <a href="./index.php" class="brand-logo center" style="margin-left:10px"><i class="material-icons">desktop_windows</i>PCP</a>
        <a href="#!" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
          <li <?php activatenav("home"); ?> ><a class="white-text" href="index.php">Home</a></li>
          <li <?php activatenav("allpc"); ?> ><a class="white-text" href="allpc.php">All Computers</a></li>
          <li <?php activatenav("addpc"); ?> ><a class="white-text" href="addpc.php">Add a Computer</a></li>
        </ul>
        <ul class="right hide-on-med-and-down">
          <li class="active"><a class="white-text" href="#!" data-target="dropdown-desktop"><?php if(!isset($username)){echo "Guest";}else{echo $username;} ?> </a></li>
          <li><?php if(!isset($username)){echo "<a class=\"white-text\" href=\"login.php\">Login</a>";}else{echo "<a class=\"white-text\"href=\"logout.php\">Logout</a>";}?></li>
        </ul>
      </div>
    </nav>
</div>
<ul class="sidenav light-blue" id="mobile-demo">
  <li><a class="white-text" href="index.php">Home</a></li>
  <li><a class="white-text" href="allpc.php">All Computers</a></li>
  <li><a class="white-text" href="addpc.php">Add a Computer</a></li>
  <li><?php if(!isset($username)){echo "<a class=\"white-text\" href=\"login.php\">Login</a>";}else{echo "<a class=\"white-text\"href=\"logout.php\">Logout of $username</a>";}?></li>
</ul>
<style>
  blockquote {
      border-left: 5px solid #03a9f4;
  }
</style>
<script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>
<?php
  function activatenav($activated){
    if ($_SESSION['activenav'] == $activated) { echo 'class="active"'; }
  }
?>
