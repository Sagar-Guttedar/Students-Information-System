<div id="footer">

 <?php if(!isset($_SESSION['lid'])) { ?> 
 <a href="Admin" class="footerL">Admin Login</a> 
 <?php }
 else 
 { ?>
  <a href="Admin/home.php" class="footerL">Home</a>
  | <a href="Admin/logout.php" class="footerL">Logout</a><?php 
  } ?>
</div>