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
<h2 class="fontforlogo"><img src="sbcalogo.png" alt="SBCA Logo"
width="14%"> <b> LRC BOOKING SYSTEM </b> </h2>

</div>