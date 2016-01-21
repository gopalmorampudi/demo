<?php
include "dbconnection.php";
 $weekDayArray = array("Sunday"=>"0","Monday"=>"1", "Tuesday"=>"2", "Wednesday"=>"3","Thursday"=>"4","Friday"=>"5","Saturday"=>"6");
 $date=date('Y-m-d l');
 $weekDay=date('l');
 $weekDayCount=$weekDayArray[$weekDay];
 ?>
 <table class="table table-bordered">
 <?php
 $diffDay=0;
 for($i=$weekDayCount;$i>=1;$i--){
	 $date1=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') - $i , date('Y')));
	 $dateOnly=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') - $i , date('Y')));
	 $sql="select * from `schedule` sc where sc.date_col='$dateOnly' and sc.fperiod='AM' order by sc.fhour;";
	 $results=mysql_query($sql);
	 $records=array();
	 while($res=mysql_fetch_array($results)){
	$record=array();
	array_push($record,$res[0]);
	array_push($record,$res[1]);
	array_push($record,$res[2]);
	array_push($record,$res[3]);
	array_push($record,$res[4]);
	array_push($record,$res[5]);
	array_push($record,$res[6]);
	array_push($record,$res[7]);
	array_push($record,$res[8]);
	array_push($record,$res[9]);
	array_push($records,$record);
	 }
 $sql1="select * from `schedule` sc where sc.date_col='$dateOnly' and sc.fperiod='PM' order by sc.fhour";
	 $results1=mysql_query($sql1);
	 $records1=array();
	$middle=array();
	 while($res=mysql_fetch_array($results1)){
	$record=array();
	if($res[3]==12 && $res[5]=='PM'){
		array_push($record,$res[0]);
		array_push($record,$res[1]);
		array_push($record,$res[2]);
		array_push($record,$res[3]);
		array_push($record,$res[4]);
		array_push($record,$res[5]);
		array_push($record,$res[6]);
		array_push($record,$res[7]);
		array_push($record,$res[8]);
		array_push($record,$res[9]);
		array_push($middle,$record);
	}else{
		array_push($record,$res[0]);
		array_push($record,$res[1]);
		array_push($record,$res[2]);
		array_push($record,$res[3]);
		array_push($record,$res[4]);
		array_push($record,$res[5]);
		array_push($record,$res[6]);
		array_push($record,$res[7]);
		array_push($record,$res[8]);
		array_push($record,$res[9]);
		array_push($records1,$record);
	}
}
	$countRecords=count($records);
	$countMiddle=count($middle);
	$countRecords1=count($records1);
	 ?>
<tr>
			<td style="width:55px;">
			<span style="font-size:16px;"><?=$date1?></span>
			<td><table>
		<tr><td style="background-color:#999;">From</td></tr><tr><td style="background-color:#999;">To</td></tr>
		</table></td>
			</td>
	<?php	
				foreach($records as $r){
					?>
					<td style="background:#999">
					<?=($r[3]<=9)?"0".$r[3]:$r[3]?>: <?=($r[4]<=9)?"0".$r[4]:$r[4]?>&nbsp;&nbsp;<?=$r[5]?><br>
					<?=($r[6]<=9)?"0".$r[6]:$r[6]?>: <?=($r[7]<=9)?"0".$r[7]:$r[7]?>&nbsp;&nbsp;<?=$r[8]?>
					</td>
					<?php
				}
				foreach($middle as $r){
					?>
					<td style="background:#999">
					<?=($r[3]<=9)?"0".$r[3]:$r[3]?>: <?=($r[4]<=9)?"0".$r[4]:$r[4]?>&nbsp;&nbsp;<?=$r[5]?><br>
					<?=($r[6]<=9)?"0".$r[6]:$r[6]?>: <?=($r[7]<=9)?"0".$r[7]:$r[7]?>&nbsp;&nbsp;<?=$r[8]?>
					</td>
					<?php
				}
				foreach($records1 as $r){
					?>
					<td style="background:#999">
					<?=($r[3]<=9)?"0".$r[3]:$r[3]?>: <?=($r[4]<=9)?"0".$r[4]:$r[4]?>&nbsp;&nbsp;<?=$r[5]?><br>
					<?=($r[6]<=9)?"0".$r[6]:$r[6]?>: <?=($r[7]<=9)?"0".$r[7]:$r[7]?>&nbsp;&nbsp;<?=$r[8]?>
					</td>
					<?php
				}
				for($k=0;$k<10-($countRecords+$countRecords1+$countMiddle);$k++){
					?>
					<td style="background:#999">
					
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<?php
				}
					?>
			</tr>
	
<?php
 }
$count=count($weekDayArray);
$count2=$count-$weekDayCount;
$iCount=0;
for($i=0;$i<$count2;$i++){
 $date1=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') + $i , date('Y')));	
 $curr_date=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + $i , date('Y')));	
 $day=date('l', mktime(0, 0, 0, date('m'), date('d') + $i , date('Y')));	
  $sql="select * from `schedule` sc where sc.date_col='$curr_date' and sc.fperiod='AM' order by sc.fhour";
	 $results=mysql_query($sql);
	 $records=array();
	 while($res=mysql_fetch_array($results)){
	$record=array();
	array_push($record,$res[0]);
	array_push($record,$res[1]);
	array_push($record,$res[2]);
	array_push($record,$res[3]);
	array_push($record,$res[4]);
	array_push($record,$res[5]);
	array_push($record,$res[6]);
	array_push($record,$res[7]);
	array_push($record,$res[8]);
	array_push($record,$res[9]);
	array_push($records,$record);
	 }
	 $sql1="select * from `schedule` sc where sc.date_col='$curr_date' and sc.fperiod='PM' order by sc.fhour";
	 $results1=mysql_query($sql1);
	 $records1=array();
	$middle=array();
	 while($res=mysql_fetch_array($results1)){
	$record=array();
	if($res[3]==12 && $res[5]=='PM'){
		array_push($record,$res[0]);
		array_push($record,$res[1]);
		array_push($record,$res[2]);
		array_push($record,$res[3]);
		array_push($record,$res[4]);
		array_push($record,$res[5]);
		array_push($record,$res[6]);
		array_push($record,$res[7]);
		array_push($record,$res[8]);
		array_push($record,$res[9]);
		array_push($middle,$record);
	}else{
		array_push($record,$res[0]);
		array_push($record,$res[1]);
		array_push($record,$res[2]);
		array_push($record,$res[3]);
		array_push($record,$res[4]);
		array_push($record,$res[5]);
		array_push($record,$res[6]);
		array_push($record,$res[7]);
		array_push($record,$res[8]);
		array_push($record,$res[9]);
		array_push($records1,$record);
	}
}
	$countRecords=count($records);
	$countMiddle=count($middle);
	$countRecords1=count($records1);
  ?>
			<tr>
			<td>
			<span style="font-size:16px;"><?=$date1?></span>
			<input type="hidden" name="date<?=$i?>" value="<?=$curr_date?>"/> 
			<input type="hidden" name="day<?=$i?>" value="<?=$day?>"/> 
			<td><table>
		<tr><td style="background-color:lightgreen;">From</td></tr><tr><td style="background-color:lightgreen;">To</td></tr>
		</table></td>
			</td>		
		<?php
				foreach($records as $r){
					?>
					<td style="background:lightgreen;cursor:pointer;" >
					<?=($r[3]<=9)?"0".$r[3]:$r[3]?>: <?=($r[4]<=9)?"0".$r[4]:$r[4]?>&nbsp;&nbsp;<?=$r[5]?><br>
					<?=($r[6]<=9)?"0".$r[6]:$r[6]?>: <?=($r[7]<=9)?"0".$r[7]:$r[7]?>&nbsp;&nbsp;<?=$r[8]?>
					</td>
					<?php
				}
				foreach($middle as $r){
					?>
					<td style="background:lightgreen;cursor:pointer;">
					<?=($r[3]<=9)?"0".$r[3]:$r[3]?>: <?=($r[4]<=9)?"0".$r[4]:$r[4]?>&nbsp;&nbsp;<?=$r[5]?><br>
					<?=($r[6]<=9)?"0".$r[6]:$r[6]?>: <?=($r[7]<=9)?"0".$r[7]:$r[7]?>&nbsp;&nbsp;<?=$r[8]?>
					</td>
					<?php
				}
				foreach($records1 as $r){
					?>
					<td style="background:lightgreen;cursor:pointer;">
					<?=($r[3]<=9)?"0".$r[3]:$r[3]?>: <?=($r[4]<=9)?"0".$r[4]:$r[4]?>&nbsp;&nbsp;<?=$r[5]?><br>
					<?=($r[6]<=9)?"0".$r[6]:$r[6]?>: <?=($r[7]<=9)?"0".$r[7]:$r[7]?>&nbsp;&nbsp;<?=$r[8]?>
					</td>
					<?php
				}
				for($k=0;$k<10-($countRecords+$countRecords1+$countMiddle);$k++){
					?>
					<td style="background:lightblue">
					
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<?php
				}
					?>				
			</tr>
			<?php
$iCount++;
$diffDay++;
 }
?>
<input type="hidden" name="icount" value="<?=$iCount?>"/> 
<tr>
</table><br>
<a href="show_next_schedule.php?date=<?=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') +$diffDay , date('Y')));?>" style="float:right; font-size: 17px;" class="btn btn-primary">next >></a>