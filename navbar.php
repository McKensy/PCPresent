<!-- Dropdown Structure -->
<ul id="dropdown-desktop" class="dropdown-content light-blue">
  <li><a class="white-text" href="index.php">Home</a></li>
  <li><a class="white-text" href="allpc.php">All Computers</a></li>
  <li><a class="white-text" href="addpc.php">Add a Computer</a></li>
</ul>
<nav>
  <div class="nav-wrapper light-blue">
    <a href="./index.php" class="brand-logo center" style="margin-left:10px"><i class="material-icons">desktop_windows</i>PCP</a>
    <a href="#!" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <ul class="left hide-on-med-and-down">
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown-desktop"><?php if(!isset($username)){echo "Guest";}else{echo $username;} ?> <i class="material-icons right">arrow_drop_down</i></a></li>
      <li><?php if(!isset($username)){echo "<a class=\"white-text\" href=\"login.php\"> Login";}else{echo "<a class=\"white-text\"href=\"logout.php\">Logout</a>";}?></li>
    </ul>
  </div>
</nav>
<ul class="sidenav light-blue" id="mobile-demo">
  <li><a class="white-text" href="index.php">Home</a></li>
  <li><a class="white-text" href="allpc.php">All Computers</a></li>
  <li><a class="white-text" href="addpc.php">Add a Computer</a></li>
</ul>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
  $(document).ready(function(){
    $(".dropdown-trigger").dropdown();
    $('.sidenav').sidenav();
  });
</script>