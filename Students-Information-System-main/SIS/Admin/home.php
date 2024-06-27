<?php
require("../config.php");
if(!isset($_SESSION['lid']))
{
	header("location:index.php?");
}
$v = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM admin WHERE loginid = '".$_SESSION['lid']."'"));
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="600; url=logout.php" />
<title>Information Portal</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script>

    function Address(f) {

        if(f.add.checked == true) {

           f.addC.value = f.addP.value;
        }

        if(f.add.checked == false) {
			 f.addC.value = '';

        }

    }
	
	
</script>
</head>
<body>
<div id="header" align="center">
<span class="heading" style="font-family: Algerian">Poojya Doddappa Appa College of Engineering</span>
</div>
<br>
<br>

<div align="center">

<br>
<br>
<br>
<br>
<br>

<div id="content">
<br>

<span class="subHead" style="font-family: Algerian">STUDENT INFORMATION REGISTRATION PANEL</span>
<br>
<br>
<hr />
<span class="Text" style="font-family: Algerian">$~~~~~***Welcome To Admin***~~~~~ $</span></span>
<hr />
<br>
<form>
<select name="branch" required title="Select Branch">
<option value="NA" selected disabled > ~ ~ ~ ~ ~ Branch ~ ~ ~ ~ ~</option>
<option value="Computer Engineering">Computer Engineering</option>
<option value="Civil Engineering">Civil Engineering</option>
<option value="Electronics and Tele-Comm. Engineering">Electronics &amp; Tele-Comm. Engineering</option>
<option value="Electronics and Power Engineering">Electronics &amp; Power Engineering</option>
<option value="Mechanical Engineering">Mechanical Engineering</option>
</select>
<br>
<br>

</form>
<br>
<hr />
<br>

<?php if($_GET['ashish'] == sha1('error'))
{
	?>
<span class="Text">N O T I F I C A T I O N</span>
<hr />
<br>
<span class="flashFalse"> Error Updating Information </span>
<br>
<?php }elseif($_GET['ashish'] == sha1('success'))
{
	?>
<span class="Text">N O T I F I C A T I O N</span>
<hr />
<br>
<span class="flashTrue"> Information Successfully Updated </span>
<br>
<?php }elseif($_GET['msg'] == sha1('1'))
{
	?>
<span class="Text">N O T I F I C A T I O N</span>
<hr />
<br>
<span class="flashFalse"> Ner Passwords Doesn't Matched </span>
<br>
<?php }elseif($_GET['msg'] == sha1('2'))
{
	?>
<span class="Text">N O T I F I C A T I O N</span>
<hr />
<br>
<span class="flashFalse"> Incorrect Current Password </span>
<br>
<?php }elseif($_GET['msg'] == sha1('3'))
{
	?>
<span class="Text">N O T I F I C A T I O N</span>
<hr />
<br>
<span class="flashTrue"> Password Successfully Updated </span>
<br>
<?php } ?>


<br>

<input type="button" value="VIEWS Students Information" onClick="window.location='home.php?ashish=<?php echo sha1('edit');?>'" />
<input type="button" value="Change Password" onClick="window.location='home.php?ashish=<?php echo sha1('changePassword');?>'" />
<br>
<br>

</div>

<br>
<br>
<?php 
if($_GET['ashish'] == sha1('edit'))
{
	?>
<div id="content">
<br>
<span class="subHead" style="font-family: Algerian">VIEWS STUDENT INFORMATION</span>
<br>
<br>
<form method="get" action="">
<select name="email" required>
<option value="0" disabled selected> - - Select Email - -</option>
<?php
$em = mysqli_query($al, "SELECT * FROM students");
while($x = mysqli_fetch_array($em))
{
	?>
		<option value="<?php echo $x['email'];?>"><?php echo $x['email'];?></option>
        <?php } ?>
<br>
<br>
<input type="hidden" name="ashish" value="<?php echo sha1('editing');?>" />
</select>
<input type="submit" value="VIEW" />
</form>
<br>
<br>
</div>
<?php } 
elseif($_GET['ashish'] == sha1('editing'))
{
	$r = mysqli_query($al, "SELECT * FROM students WHERE email = '".$_GET['email']."'");
	$e = mysqli_fetch_array($r);
	if(!mysqli_num_rows($r) == 1)
	{
	 	header("location:home.php?");
	}
?>
<div id="content">
<br>
<span class="subHead">VIEWS INFORMATION [ <span style="color:rgba(124,245,39,1.00);"><?php echo $_GET['email'];?></span> ]
<br>
<br>

<form method="post" action="editing.php">
<input type="text" placeholder="First Name" required size="25" class="cap" name="fn" title="Enter First Name" value="<?php echo $e['first_name'];?>"  />

<input type="text" placeholder="Last Name" required size="25" class="cap" name="ln" title="Enter Last Name" value="<?php echo $e['last_name'];?>" />

<input type="text" placeholder="Father Name" required size="25" class="cap" name="mn" title="Enter Father Name" value="<?php echo $e['father_name'];?>" />
<br>
<br>

<input type="radio" value="Male" name="gender" title="Gender" required <?php if($e['gender'] == "Male") { echo "checked"; } ?> /><span class="Text" title="Gender">Male</span>
<input type="radio" value="Female" name="gender" title="Gender" <?php if($e['gender'] == "Female") { echo "checked"; } ?> /><span class="Text" title="Gender">Female</span>
<br>
<br>
<input type="date" name="dob" title="Enter Date of Birth" placeholder="Date of Birth" required value="<?php echo $e['date_of_birth'];?>" /> <br>
<span class="Text">Eg. 01/01/2022</span>
<br>
<br>
<input type="text" name="mob" title="Enter Contact No." placeholder="Contact Number" size="40" required maxlength="10" value="<?php echo $e['contact_no'];?>" />

<input type="text" name="pmob" title="Enter Parents Contact No." placeholder="Parents Contact Number" size="40" required maxlength="10" value="<?php echo $e['parents_contact_no'];?>" />
<br>
<br>
<input type="email" name="email" title="Enter Email-ID" placeholder="Email ID" size="40" required value="<?php echo $e['email'];?>" />

<input type="text" name="adhaar" title="Enter 12 Digit Adhaar No." placeholder="12 Digit Adhaar No." required maxlength="12" size="40" value="<?php echo $e['adhaar_no'];?>" />
<br>
<br>
<textarea rows="2" cols="40" name="addP" title="Enter Permanent Address" placeholder="Enter Permanent Address" required id="addP" class="cap"><?php echo $e['permanent_address'];?></textarea>
<br>
<br>
<input type="checkbox" onclick="Address(this.form)" name="add">
<span class="Text">Check this box if Permanent Address and Correspondence Address are the same.</span>
<br>
<br>
<textarea rows="2" cols="40" name="addC" title="Enter Correspondence Address" placeholder="Enter Correspondence Address" required id="addC" class="cap"><?php echo $e['correspondence_address'];?></textarea>
<br>
<br>
<hr />
<span class="Text">College Information</span>
<hr />
<br>

<input type="text" name="roll" title="Enter vtu No." size="25" placeholder="Class vtu No." value="<?php echo $e['vtu_no'];?>"/>


<select name="branch" required title="Select Branch">
<option value="NA" > $~ ~ ~ ~ ~ ~ Branch ~ ~ ~ ~ ~ ~$</option>
<option value="Computer Engineering" <?php if($e['branch'] == "Computer Engineering")echo "selected";?>>Computer Engineering</option>
<option value="Civil Engineering" <?php if($e['branch'] == "Civil Engineering")echo "selected";?>>Civil Engineering</option>
<option value="Electronics and Tele-Comm. Engineering" <?php if($e['branch'] == "Electronics and Tele-Comm. Engineering")echo "selected";?>>Electronics &amp; Tele-Comm. Engineering</option>
<option value="Electronics and Power Engineering" <?php if($e['branch'] == "Electronics and Power Engineering")echo "selected";?>>Electronics &amp; Power Engineering</option>
<option value="Mechanical Engineering" <?php if($e['branch'] == "Mechanical Engineering")echo "selected";?>>Mechanical Engineering</option>
</select>
<br>
<br>
<select name="ac_year" required title="Select Academic Year">
<option value="NA" disabled > ~ ~ ~ Academic Year ~ ~ ~</option>
<option value="2017-2018" <?php if($e['academic_year'] == "2017-2018")echo "selected";?>>2017-2018</option>
<option value="2018-2019" <?php if($e['academic_year'] == "2018-2019")echo "selected";?>>2018-2019</option>
<option value="2019-2020" <?php if($e['academic_year'] == "2019-2020")echo "selected";?>>2019-2020</option>
<option value="2020-2021" <?php if($e['academic_year'] == "2020-2021")echo "selected";?>>2020-2021</option>
</select>

<select name="year" required title="Select Year">
<option value="NA" disabled > ~ ~ ~ Year ~ ~ ~</option>
<option value="First Year" <?php if($e['year'] == "First Year")echo "selected";?>>First Year</option>
<option value="Second Year" <?php if($e['year'] == "Second Year")echo "selected";?>>Second Year</option>
<option value="Third Year" <?php if($e['year'] == "Third Year")echo "selected";?>>Third Year</option>
<option value="Final Year" <?php if($e['year'] == "Final Year")echo "selected";?>>Final Year</option>
</select>

<select name="section" required title="Select Section">
<option value="NA" disabled > ~ ~ ~ Section ~ ~ ~</option>
<option value="A" <?php if($e['section'] == "A")echo "selected";?>>A</option>
<option value="B" <?php if($e['section'] == "B")echo "selected";?>>B</option>
<option value="C" <?php if($e['section'] == "C")echo "selected";?>>C</option>
<option value="D" <?php if($e['section'] == "D")echo "selected";?>>D</option>
<option value="E" <?php if($e['section'] == "E")echo "selected";?>>E</option>
<option value="F" <?php if($e['section'] == "F")echo "selected";?>>F</option>
</select>
<br>
<br>
<span class="Text">Category : </span><input type="radio" name="cat" value="OPEN" required title="OPEN" <?php if($e['category_type'] == "OPEN")echo "checked";?> /> <span class="Text" title="OPEN">Open</span> <input type="radio" name="cat" value="RESERVED" required title="RESERVED" <?php if($e['category'] == "RESERVED")echo "checked";?> /> <span class="Text" title="RESERVED">Reserved</span>
<br>
<br>
 <input type="text" name="caste" required size="30" title="Enter Caste" placeholder="Caste" value="<?php echo $e['caste'];?>" class="cap" />

<input type="text" name="scaste" size="30" title="Enter Sub-Caste" placeholder="Sub-Caste" value="<?php echo $e['category'];?>" class="cap" />
<br>
<br>

<input type="text" placeholder="ODD SEM" title="Enter  ODD SEM" name="odd_roll" required class="cap" size="20"  value="<?php echo $e['odd_sem'];?>"/>
<input type="text" placeholder="Marks Obtained" title="Enter Marks Obtained" name="odd_mo" id="odd_mo" size="14" required  value="<?php echo $e['odd_marks_obtained'];?>"/> 
<span class="Text">/ 
<input type="text" placeholder="Total Marks" name="odd_to" id="odd_to" size="14" required title="Enter Total Marks"  value="<?php echo $e['odd_total_marks'];?>"/>
=
<input type="text" placeholder="Percentage" name="odd_per" id="odd_per" size="14" required title="Enter Percentage" onFocus="PercentCGP(this.form)"  value="<?php echo $e['odd_percentage'];?>"/>
%</span>
<br>
<br>


<input type="text" placeholder="EVEN SEM" title="Enter EVEN SEM" name="even_roll" required class="cap" size="20"  value="<?php echo $e['even_sem'];?>"/>
<input type="text" placeholder="Marks Obtained" title="Enter Marks Obtained" name="even_mo" id="even_mo" size="14" required  value="<?php echo $e['even_marks_obtained'];?>"/> 
<span class="Text">/ 
<input type="text" placeholder="Total Marks" name="even_to" id="even_to" size="14" required title="Enter Total Marks"  value="<?php echo $e['even_total_marks'];?>"/>
=
<input type="text" placeholder="Percentage" name="even_per" id="even_per" size="14" required title="Enter Percentage" onFocus="PercentCGPS(this.form)"  value="<?php echo $e['even_percentage'];?>"/>
%

<br>
<br>


Distict code:
<input type="text" placeholder="Distict_code" title="Enter Distict_code" name="dict_code" id="dist_code" size="14" value="<?php echo $e['distict_code'];?>"/> 

Distict of collage:
<input type="text" placeholder="Distict" title="Enter Distict" name="dist" id="dist" size="14" value="<?php echo $e['collage_distict'];?>"/> 
<br>
<br>
<input type="hidden" name="id" value="<?php echo $e['id'];?>">

</span>
</form>

<br>
<br>

</div>
<br>
<br>
<br>

<?php } 
if($_GET['ashish'] == sha1('changePassword'))
{
	
?>
<div id="content">
<br>
<span class="subHead">CHANGE ADMIN ACCOUNT PASSWORD</span>
<br>
<hr />
<br>
<form method="post" action="changePassword.php?=<?php echo sha1('ashish').sha1('vegan').sha1('forever');?>">
<input type="password" placeholder="Current Password" title="Enter Current Password" size="40" required name="p1" />
<br>
<br>
<input type="password" placeholder="New Password" title="Enter New Password" size="40" required name="p2" />
<br>
<br>
<input type="password" placeholder="Retype New Password" title="Retpe Password" size="40" required name="p3" />
<br>
<br>
<input type="submit" value="Change Password" />
</form>
<br>
<br>

</div>
<br>
<br>
<br>

<?php } ?>
<br>
<br>
<br>
<?php require("footer.php");?>
</body>

 </html>

