<?php
require("config.php");
$flag = 2;
if(!empty($_POST))
{
	if($_POST['roll'] == NULL)
	{
		$roll = 0;
	}
	else
	{
		$roll = $_POST['roll'];
	}
	$_SESSION['fn'] = $_POST['fn'];
	$_SESSION['mn'] = $_POST['mn'];
	$_SESSION['ln'] = $_POST['ln'];
	$_SESSION['gender'] = $_POST['gender'];
	$_SESSION['dob'] = $_POST['dob'];
	$_SESSION['mob'] = $_POST['mob'];
	$_SESSION['pmob'] = $_POST['pmob'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['adhaar'] = $_POST['adhaar'];
	$_SESSION['addP'] = $_POST['addP'];
	$_SESSION['addC'] = $_POST['addC'];
	$_SESSION['roll'] = $_POST['roll'];
	$_SESSION['branch'] = $_POST['branch'];
	$_SESSION['ac_year'] = $_POST['ac_year'];
	$_SESSION['year'] = $_POST['year'];
	$_SESSION['section'] = $_POST['section'];
	$_SESSION['cat'] = $_POST['cat'];
	$_SESSION['caste'] = $_POST['caste'];
	$_SESSION['scaste'] = $_POST['scaste'];
	
	
	$_SESSION['odd_sem'] = $_POST['odd_sem'];
	$_SESSION['odd_mo'] = $_POST['odd_mo'];
	$_SESSION['odd_to'] = $_POST['odd_to'];
	$_SESSION['odd_per'] = $_POST['odd_per'];
	
	
	$_SESSION['even_sem'] = $_POST['even_sem'];
	$_SESSION['even_mo'] = $_POST['even_mo'];
	$_SESSION['even_to'] = $_POST['even_to'];
	$_SESSION['even_per'] = $_POST['even_per'];
	
	$_SESSION['dist_code'] = $_POST['dist_code'];
	$_SESSION['dist'] = $_POST['dist'];
	
	
	$sql = mysqli_query($al, "INSERT INTO students(first_name,last_name,father_name,gender,date_of_birth,contact_no,parents_contact_no,email,adhaar_no,permanent_address,correspondence_address,vtu_no,branch,academic_year,year,section,category_type,caste,category,odd_sem,odd_marks_obtained,odd_total_marks,odd_percentage,even_sem,even_marks_obtained,even_total_marks,even_percentage,distict_code,collage_distict,time,date,ip,agent) VALUES('".ucwords($_POST['fn'])."', '".ucwords($_POST['ln'])."',  '".ucwords($_POST['mn'])."','".$_POST['gender']."', '".$_POST['dob']."', '".$_POST['mob']."', '".$_POST['pmob']."', '".strtolower($_POST['email'])."', '".$_POST['adhaar']."', '".ucwords($_POST['addP'])."', '".ucwords($_POST['addC'])."', '".$roll."', '".$_POST['branch']."', '".$_POST['ac_year']."', '".$_POST['year']."', '".$_POST['section']."', '".$_POST['cat']."', '".ucwords($_POST['caste'])."', '".ucwords($_POST['scaste'])."', '".ucwords($_POST['odd_sem'])."', '".$_POST['odd_mo']."', '".$_POST['odd_to']."', '".$_POST['odd_per']."', '".ucwords($_POST['even_sem'])."', '".$_POST['even_mo']."', '".$_POST['even_to']."', '".$_POST['even_per']."', '".$_POST['dist_code']."', '".$_POST['dist']."', '".date('h:i:s A')."', '".date('d/m/Y')."', '".$_SERVER['REMOTE_ADDR']."', '".$_SERVER['HTTP_USER_AGENT']."')");
	
	if(!$sql)
	{ 
		header("location:index.php?=".sha1('error')); 
	} 
	else 
	{  
		session_destroy();
		header("location:success.php?=".sha1('success'));
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Information Portal</title>
<link href="style.css" rel="stylesheet" type="text/css">
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

<span class="subHead" style="font-family: Algerian">STUDENTS INFORMATION REGISTRATION PANEL</span>
<br>
<br>
<hr />
<span class="Text" style="font-family: Algerian">Personal Informations</span>
<hr />
<br>

<form method="post" action="">
<?php if($flag == 0)
{
	?>
	<span class="flashFalse">Adhaar No. or Email Id Already Exists</span>
<?php } ?>
<br>
<br>

<input type="text" placeholder="First Name" required size="25" class="cap" name="fn" title="Enter First Name" value="<?php echo $_SESSION['fn'];?>"  />

<input type="text" placeholder="Last Name" required size="25" class="cap" name="ln" title="Enter Last Name" value="<?php echo $_SESSION['ln'];?>" />

<input type="text" placeholder="Father Name" required size="25" class="cap" name="mn" title="Enter Father Name" value="<?php echo $_SESSION['mn'];?>" />
<br>
<br>

<input type="radio" value="Male" name="gender" title="Gender" required /><span class="Text" title="Gender">Male</span>
<input type="radio" value="Female" name="gender" title="Gender" /><span class="Text" title="Gender">Female</span>
<br>
<br>
<input type="date" name="dob" title="Enter Date of Birth" placeholder="Date of Birth" required value="<?php echo $_SESSION['dob'];?>" /> <br>
<span class="Text">Eg. 01/01/2022</span>
<br>
<br>
<input type="text" name="mob" title="Enter Contact No." placeholder="Contact Number" size="40" required maxlength="10" value="<?php echo $_SESSION['mob'];?>" />

<input type="text" name="pmob" title="Enter Parents Contact No." placeholder="Parents Contact Number" size="40" required maxlength="10" value="<?php echo $_SESSION['pmob'];?>" />
<br>
<br>
<input type="email" name="email" title="Enter Email-ID" placeholder="Email ID" size="40" required value="<?php echo $_SESSION['email'];?>" />

<input type="text" name="adhaar" title="Enter 12 Digit Adhaar No." placeholder="12 Digit Adhaar No." required maxlength="12" size="40" value="<?php echo $_SESSION['adhaar'];?>" />
<br>
<br>
<textarea rows="2" cols="40" name="addP" title="Enter Permanent Address" placeholder="Enter Permanent Address" required id="addP" class="cap"><?php echo $_SESSION['addP'];?></textarea>
<br>
<br>
<input type="checkbox" onclick="Address(this.form)" name="add">
<span class="Text">Check this box if Permanent Address and Correspondence Address are the same.</span>
<br>
<br>
<textarea rows="2" cols="40" name="addC" title="Enter Correspondence Address" placeholder="Enter Correspondence Address" required id="addC" class="cap"><?php echo $_SESSION['addC'];?></textarea>
<br>
<br>
<hr />
<span class="Text" style="font-family: Algerian">College Information</span>
<hr />
<br>

<input type="text" name="roll" title="Enter VTU No." size="25" placeholder="VTU No." value="<?php echo $_SESSION['roll'];?>"/>

<select name="branch" required title="Select Branch" >
<option value="NA" selected disabled > ~ ~ Branch ~ ~</option>
<option value="Computer Engineering">Computer Engineering</option>
<option value="Civil Engineering">Civil Engineering</option>
<option value="Electronics and Tele-Comm. Engineering">Electronics &amp; Tele-Comm. Engineering</option>
<option value="Electronics and Power Engineering">Electronics &amp; Power Engineering</option>
<option value="Mechanical Engineering">Mechanical Engineering</option>
</select>
<br>
<br>
<select name="ac_year" required title="Select Academic Year">
<option value="NA" selected disabled > ~ ~ ~ Academic Year ~ ~ ~</option>
<option value="2017-2018">2017-2018</option>
<option value="2018-2019">2018-2019</option>
<option value="2019-2020">2019-2020</option>
<option value="2020-2021">2020-2021</option>
<option value="2020-2021">2021-2022</option>
</select>

<select name="year" required title="Select Year">
<option value="NA" selected disabled > ~ ~ ~ Year ~ ~ ~</option>
<option value="First Year">First Year</option>
<option value="Second Year">Second Year</option>
<option value="Third Year">Third Year</option>
<option value="Final Year">Final Year</option>
</select>

<select name="section" required title="Select Section">
<option value="NA" selected disabled >~ ~ ~ Section ~ ~ ~</option>
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
</select>
<br>
<br>
<span class="Text">Category : </span><input type="radio" name="cat" value="OPEN" required title="OPEN" /> <span class="Text" title="OPEN">Open</span> <input type="radio" name="cat" value="RESERVED" required title="RESERVED" /> <span class="Text" title="RESERVED">Reserved</span>
<br>
<br>
 <input type="text" name="caste" required size="30" title="Enter Caste" placeholder="Caste" value="<?php echo $_SESSION['caste'];?>" class="cap" />

<input type="text" name="scaste" size="30" title="Enter category" placeholder="category" value="<?php echo $_SESSION['scaste'];?>" class="cap" />
<br>
<br>


<input type="text" placeholder="ODD SEM" title="Enter the SEM ." name="odd_sem" required class="cap" size="20"  value="<?php echo $_SESSION['odd_sem'];?>"/>
<input type="text" placeholder="Marks Obtained" title="Enter Marks Obtained" name="odd_mo" id="odd_mo" size="14" required  value="<?php echo $_SESSION['odd_mo'];?>"/> 
<span class="Text">/ 
<input type="text" placeholder="Total Marks" name="odd_to" id="odd_to" size="14" required title="Enter Total Marks"  value="<?php echo $_SESSION['odd_to'];?>"/>
=
<input type="text" placeholder="Percentage" name="odd_per" id="odd_per" size="14" required title="Enter Percentage" onFocus="PercentCGP(this.form)"  value="<?php echo $_SESSION['odd_per'];?>"/>
%</span>
<br>
<br>

 
<input type="text" placeholder="EVEN SEM" title="Enter EVEN SEM" name="even_sem" required class="cap" size="20"  value="<?php echo $_SESSION['even_sem'];?>"/>
<input type="text" placeholder="Marks Obtained" title="Enter Marks Obtained" name="even_mo" id="even_mo" size="14" required  value="<?php echo $_SESSION['even_mo'];?>"/> 
<span class="Text">/ 
<input type="text" placeholder="Total Marks" name="even_to" id="even_to" size="14" required title="Enter Total Marks"  value="<?php echo $_SESSION['even_to'];?>"/>
=
<input type="text" placeholder="Percentage" name="even_per" id="even_per" size="14" required title="Enter Percentage" onFocus="PercentCGPS(this.form)"  value="<?php echo $_SESSION['even_per'];?>"/>
%

<br>
<br>
<br>
<br>



Distict code:
<input type="text" placeholder="Distict_code" title="Enter Distict code" name="dist_code" id="dist_code" size="14" value="<?php echo $_SESSION['dist_code'];?>"/> 




Distict of collage:
<input type="text" placeholder="Distict" title="Enter Distict" name="dist" id="dist" size="14" value="<?php echo $_SESSION['dist'];?>"/> 
<br>
<br>
<br>
<br>
<input type="submit" value="SAVE" onClick="return confirm('Are You Sure..?')" /> 
<input type="reset" value="CLEAR" />
</span>

</form>
<br>
<br>

</div>
<br>
<br>
<br>
<br>
<br>
<?php require("footer.php");?>
</body>
 </html>

