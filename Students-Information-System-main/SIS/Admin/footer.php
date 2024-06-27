<div id="footer">
<?php if(!isset($_SESSION['lid'])) { 
?> 
<a href="" class="footerL">Admin Login</a> 
<?php } else { ?>
<a href="home.php" class="footerL">Home</a> 
| <a href="logout.php" class="footerL">Logout</a><?php } ?> | <a href="../" class="footerL">Exit</a>
</div>