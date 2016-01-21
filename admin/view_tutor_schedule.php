<?php
session_start();
include "DBConnection.php";
?>
<html>
<body>
<center>
<h1>Tutor Schedule</h1></center><br>
<table border="1" align="center">
<tr>

<th>Week</th>
<th>Timing</th>
</tr>

<?php
$tutor_id=$_SESSION['tutor_id'];

$sql="select t.subject_id,t.week_days,t.from_time,t.to_time from tutor_schedule t where t.tutor_id='$tutor_id'";
$result=mysql_query($sql);
 if($res=mysql_fetch_array($result)){
	 $res1=$res['week_days'];
	 $res2=explode(",",$res1);
	 foreach($res2 as $rs){
	?>
	<tr>		
	<td><?php echo $rs?></td>		
	</tr>	
	
<?php
 }
 }
?>