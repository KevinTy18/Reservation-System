<div class="header">
  <a class="logo" style="color:white;"> Welcome, <?php  if
(isset($_SESSION['user'])) : ?>
<strong><?php echo $_SESSION['user']['username']; ?>!</strong>


<?php endif ?></a>
    
    
    
    <a style="color:white;background-color:#000000b0;left:50%">Current Date and Time: <span id='ct'></span></a>
  <div class="header-right">
    <a href="index.php" class="smallbutton"
style="margin-right:5px;background-color:white;color:maroon;">
          <span class="fa fa-home" style="font-size:20px"></span> Home
    </a>
    <a href="index.php?logout='1'" class="smallbutton"
style="margin-right:10px;background-color:white;color:maroon;">
          <span class="fa fa-sign-out" style="font-size:20px"></span> Log out
    </a>
  </div>
   <span id='ct'></span>
</div>

<div style="margin:1%;">
</div>
<div class="divsize" align="center">
<!--<img src="sbcalogo.png" alt="SBCA Logo" width="7%" align="center" > -->
<img src="../sanbedapics/LRClogo.png" alt="LRC Logo" width="20%" height="100%" style="margin-top: -10px;margin-left: 18px;float:left;">
<img src="../sanbedapics/sbcalogo.png" alt="LRC Logo" width="15%" height="90%" style="margin-right: 18px;float:right;">
<h2 class="fontforlogo" style="vertical-align: middle;
    text-align: center; "> <b> LRC BOOKING SYSTEM </b> </h2>

</div>