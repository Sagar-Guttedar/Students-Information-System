<?php
require("../config.php");
$password= "pass123";   

if(!isset($_SESSION['lid']))
{
	header("location:index.php?");
}
$v = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM admin WHERE loginid = '".$_SESSION['lid']."'"));
if($v['password'] == sha1($_POST['p1']))
{
	if($_POST['p2'] == $_POST['p3'])
	{
		mysqli_query($al, "UPDATE admin SET password = '".sha1($_POST['p1'])."' WHERE loginid = '".$_SESSION['lid']."'");
		header("location:home.php?msg=".sha1('3'));
	}
	else
	{
		header("location:home.php?=".sha1('changePassword')."&msg=".sha1('1'));
	}
}
else
{
	header("location:home.php?=".sha1('changePassword')."&msg=".sha1('2'));
}
?>
