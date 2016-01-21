<?php
session_start();
include "DBConnection.php";

if(isset($_GET['action'])){
if($_GET['action']=='schedule'){
	if(isset($_SESSION))
?>
<html>
<center>
<head>
<title>Tutor Schedule Form</title>



<script>
{
var xmlhttp;
var fromDate=document.getElementById("from_date").value;
var toDate=document.getElementById("to_date").value;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		var noOfDays=xmlhttp.responseText;
		var subArr=noOfDays.split(' ');
		document.getElementById("days").value=subArr[0].substring(1).trim();
    }
  }
xmlhttp.open("GET","schedule_form.php?action=count&from_date="+fromDate+"&to_date="+toDate,true);
xmlhttp.send();
}*/
</script>
</head></center><br>
<body>
<center>


<h1>Tutor Schedule Form</h1>
<?php
if(isset($_SESSION['flag'])){
if($_SESSION['flag']=='sucess'){
?>
<span> Sucessfully added</span>
<?php
}
else if($_SESSION['flag']=='failed'){
?>
<span> Exceed your working days count </span>
<?php
}
}
?>

<table>
<form method="post" action="insert_data.php">
<tr>
<td>subject:</td>
<td>
<select name="subject">
<option>Please Select Subject</option>
<?php
$tutor_email=$_SESSION['tutor_email'];
$sql="select subject from tutor where emailid='$tutor_email'";
$result=mysql_query($sql);
if($res=mysql_fetch_row($result)){
$nestedSql='select subject_id,subject_name from subject where subject_id in('.$res[0].')';
		$nestedRes=mysql_query($nestedSql);
		while($result1=mysql_fetch_array($nestedRes)){
		?>
		<option value="<?php echo $result1[0]?>"><?php echo $result1[1]?></option>
	<?php
		
	}
	}
?>
</select>
</td>
</tr>
<td>from Date</td>
<td><input type="date" name="from_date" id="from_date"></td>
</tr>
<br>

<tr>
<td>To Date</td>
<td><input type="date" name="to_date" id="to_date" onchange="loadXMLDoc()"/></td>
</tr>

<tr>
<td>No.Of Days</td>
<td>
<input type="text" name="days" id="days">
</td>
</tr>-->

<tr>
<td>From Time</td>
<td><input type="text" name="from_time" placeholder="HH:MI:SS"></td>
</tr>

<tr>
<td>To Time</td>
<td><input type="text" name="to_time" placeholder="HH:MI:SS"></td>
</tr>


<tr>
<td>Available days in a week</td><br>
<td>
<input type="checkbox" name="week_day[]" value="sunday"/>Sunday<br>
<input type="checkbox" name="week_day[]" value="Monday"/>Monday<br>
<input type="checkbox" name="week_day[]" value="Tuesday"/>Tuesday<br>
<input type="checkbox" name="week_day[]" value="Wednesday"/>Wednesday<br>
<input type="checkbox" name="week_day[]" value="Thursday"/>Thursday<br>
<input type="checkbox" name="week_day[]" value="Friday"/>Friday<br>
<input type="checkbox" name="week_day[]" value="Saturday"/>Saturday<br>
</td>
</tr>
<?php
}
?>

<tr> 
<td colspan="2" align="center"><button type="submit" name="action" value="schedule_tutor_timings" onclick="validate(this);">Schedule</button></td>
</tr>
</form>
</table>
</center>
</body>
</html>
<?php
}
if($_GET['action']=='count'){
$from_date=$_REQUEST['from_date'];
$from=date_create($from_date);
$to_date=$_REQUEST['to_date'];
$to=date_create($to_date);

$diff=date_diff($from,$to);
echo $diff->format("%R%a days");
}
unset($_SESSION['flag']);
?>