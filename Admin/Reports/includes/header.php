<div class="header" id="main">
  <a class="logo" style="color:white;"> Welcome, <?php  if
(isset($_SESSION['user'])) : ?>
<strong><?php echo $_SESSION['user']['username']; ?>!</strong>


<?php endif ?></a>
  <div class="header-right">
    <a href="../../Admin/index.php" class="smallbutton" style="margin-right:5px;color:maroon;">
          <span class="fa fa-home" style="font-size:20px"></span> Home
    </a>
    <a href="../../Admin/index.php?logout='1'" class="smallbutton"
style="margin-right:10px;color:maroon;">
          <span class="fa fa-sign-out" style="font-size:20px"></span> Log out
    </a>
  </div>
</div>
<div style="margin:1%;">
</div>
<div class="divsize" align="center">
<!--<img src="sbcalogo.png" alt="SBCA Logo" width="7%" align="center" > -->
<h2 class="fontforlogo"><img src="../../sanbedapics/sbcalogo.png" alt="SBCA Logo"
width="14%"><b> LRC BOOKING SYSTEM</b></h2>
</div>