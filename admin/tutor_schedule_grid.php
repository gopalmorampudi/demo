<?php
$tutor=$_REQUEST['tutorID'];
include "DBConnection.php";
 $date = date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') - 3, date('Y'))).'<br>';
$weekDaysArray=array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
$timeArray=array('8:00AM','9:00AM','10:00AM','11:00AM','12:00AM','1:00PM','2:00PM','3:00PM','4:00PM','5:00PM');
?>
<html>
<head>
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>
<body>
<div class="table-responsive">
<table class="table" border style="border-collapse:collapse;">
<tr class="danger">
<th>Date\Time<br></th>
<th>8:00AM</th>
<th>9:00AM</th>
<th>10:00AM</th>
<th>11:00AM</th>
<th>12:00AM</th>
<th>1:00PM</th>
<th>2:00PM</th>
<th>3:00PM</th>
<th>4:00PM</th>
<th>5:00PM</th>
</tr>
<?php
for($i=0;$i<7;$i++){
	$dates=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') + $i, date('Y')));
	$currentDate=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + $i, date('Y')));
 $query="select tsc.tutor_id,st.student_name,s.subject_name,tsc.date_selected,tsc.time_selected,tsc.`status` 
from tutor_student_classes tsc,subject s,student st
where tsc.tutor_id=$tutor and tsc.date_selected='$currentDate' and tsc.subject_id=s.subject_id and st.emailid=tsc.student_email and tsc.`status`='schedule';";
$result=mysql_query($query);
$records=array();
while($res=mysql_fetch_row($result)){
	$record=array();	
	array_push($record,$res[0]);
	array_push($record,$res[1]);
	array_push($record,$res[2]);
	array_push($record,$res[3]);
	array_push($record,$res[4]);
	array_push($record,$res[5]);
	array_push($records,$record);
}
?>

<tr>
<?php
if(!strpos($dates,'Sunday')){
?>
<td class="success"><?=$dates?></td>
<?php
for($j=0;$j<sizeof($timeArray);$j++){
	if(!$records){

	?>
	<td class="active">
	</td>
	<?php
	}else{
			$subject='';
			$student_name='';
			for($k=0;$k<sizeof($records);$k++){
				

		if($timeArray[$j]==$records[$k][4]){
			$subject.=$records[$k][2];
			$student_name.=$records[$k][1];
		}
		}
		?>
			<td <?=($subject!='')?'class="info"':'class="active"'?>>

			<?=($subject!='')?'<span class="glyphicon glyphicon-book" title="course"></span>&nbsp;&nbsp;<b>'.$subject.'</b><br/>':''?>
			<?=($student_name!='')?'<span class="glyphicon glyphicon-user" title="student"></span>&nbsp;&nbsp;<b>'.$student_name.'</b>':''?>
			<?php 
			?>
		
		
			</td>
			<?php
	}
?>
<?php
}
?>

</tr>
<?php
}
}
?>
</table>
</div>
</body>
</html>