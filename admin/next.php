<?php
$date=$_REQUEST['date'];
$curr_date=date("Y-m-d");
$dateArray=explode("-",$date);
$curr_dateArray=explode("-",$curr_date);
$diffDay=$dateArray[2]-$curr_dateArray[2];
$diffMonth=$dateArray[1]-$curr_dateArray[1];
$diffYear=$dateArray[0]-$curr_dateArray[0];
?>
 <form action="saveSchedule.php" method="post">
<table class="table table-bordered">
<?php
if($curr_dateArray[0]==$dateArray[0] && $curr_dateArray[1]==$dateArray[1]){
$iCount=0;
for($i=0;$i<6;$i++){
	$date1=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') +$diffDay , date('Y')));
	$curr_date=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + $diffDay , date('Y')));	
	$day=date('l', mktime(0, 0, 0, date('m'), date('d') + $diffDay , date('Y')));	
?>
<tr>
			<td>
			<span style="font-size:16px;"><?=$date1?></span>
			<input type="hidden" name="date<?=$i?>" value="<?=$curr_date?>"/> 
			<input type="hidden" name="day<?=$i?>" value="<?=$day?>"/> 
			<td style="background-color:lightgreen;">
				<table>
		<tr><td style="background-color:lightgreen; font-weight:bold; padding: 5px;font-size: 16px; text-align:left">From</td></tr>
				<tr><td style="background-color:lightgreen; font-weight:bold; padding: 5px;font-size: 16px; text-align:left">To</td></tr>
		</table></td>
			</td>
<?php
				for($c=0;$c<6;$c++){
		?>
		
<td style="background:lightgreen;padding: 16px 5px;width: 200px;">
<select name="<?='fhour'.$i.$c?>" >
<option value="">H</option>
<?php
for($j=1;$j<13;$j++){
?>
<option value="<?=$j?>"><?=$j?></option>
<?php
}
?>
</select>&nbsp;<span>:</span>
<input type="number" id="<?='fminutes'.$i?>" name="<?='fminutes'.$i.$c?>" placeholder="MM"   min="0" max="59"style="height:20px;width:40px;" />
<select id="<?='fperiod'.$i?>" name="<?='fperiod'.$i.$c?>">
<option value="AM">AM</option>
<option value="PM">PM</option>
</select>
<br>

<select name="<?='thour'.$i.$c?>" style="
    margin-top: 6px;">
	<option value="">H</option>
<?php
for($j=1;$j<13;$j++){
?>
<option value="<?=$j?>"><?=$j?></option>
<?php
}
?>
</select>&nbsp;<span>:</span>
<input type="number" id="<?='tminutes'.$i?>" name="<?='tminutes'.$i.$c?>" placeholder="MM" min="0" max="59" style="height:20px;width:40px;" />
<select id="<?='tperiod'.$i?>" name="<?='tperiod'.$i.$c?>">
<option value="AM">AM</option>
<option value="PM">PM</option>
</select>
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
<th colspan="6"><br><button onclick="fill the form" id="<?='but'?>" style="width:100px;height:30px;background-color:lightgreen;border:none;border-radius:5px;box-shadow:black 2px 2px 2px;">Set</button></th>
</tr>
</table>
</form>
<a href="make_schedule.php" style="float:left; font-size: 17px" class="btn btn-primary">
<< previous</a>
<a href="make_next_schedule.php?date=<?=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') +$diffDay , date('Y')));?>" style="float:right; font-size: 17px" class="btn btn-primary" >next >></a>
<?php
}else if($curr_dateArray[0]==$dateArray[0] && $curr_dateArray[1]<$dateArray[1]){
$iCount=0;
for($i=0;$i<6;$i++){
	$date1=date('Y-m-d l', mktime(0, 0, 0, date('m')+$diffMonth, date('d') +$diffDay , date('Y')));
	$curr_date=date('Y-m-d', mktime(0, 0, 0, date('m')+$diffMonth, date('d') + $diffDay , date('Y')));	
	$day=date('l', mktime(0, 0, 0, date('m')+$diffMonth, date('d') + $diffDay , date('Y')));	
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
				for($c=0;$c<6;$c++){
		?>
		
<td style="background:lightgreen;padding: 16px 5px;width: 200px;">
<select name="<?='fhour'.$i.$c?>">
	<option value="">H</option>
<?php
for($j=1;$j<13;$j++){
?>
<option value="<?=$j?>"><?=$j?></option>
<?php
}
?>
</select>&nbsp;<span>:</span>
<input type="number" id="<?='fminutes'.$i?>" name="<?='fminutes'.$i.$c?>" placeholder="MM" min="0" max="59" style="height:20px;width:40px;" />
<select id="<?='fperiod'.$i?>" name="<?='fperiod'.$i.$c?>">
<option value="AM">AM</option>
<option value="PM">PM</option>
</select>
<br>

<select name="<?='thour'.$i.$c?>">
	<option value="">H</option>
<?php
for($j=1;$j<13;$j++){
?>
<option value="<?=$j?>"><?=$j?></option>
<?php
}
?>
</select>&nbsp;<span>:</span>
<input type="number" id="<?='tminutes'.$i?>" name="<?='tminutes'.$i.$c?>" placeholder="MM" min="0" max="59" style="height:20px;width:40px;"/>
<select id="<?='tperiod'.$i?>" name="<?='tperiod'.$i.$c?>">
<option value="AM">AM</option>
<option value="PM">PM</option>
</select>
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
<th colspan="6"><br><button onclick="fill the form" id="<?='but'?>" style="width:100px;height:30px;background-color:lightgreen;border:none;border-radius:5px;box-shadow:black 2px 2px 2px;">Set</button></th>
</tr>
</table>
</form>
<a href="make_schedule.php" style="float:left;" class="btn btn-primary"><< previous</a>
<a href="make_next_schedule.php?date=<?=date('Y-m-d', mktime(0, 0, 0, date('m')+$diffMonth, date('d') +$diffDay , date('Y')));?>" style="float:right;" class="btn btn-primary">next >></a>
<?php
}else if($curr_dateArray[0]<$dateArray[0]){
	$iCount=0;
for($i=0;$i<6;$i++){
	$date1=date('Y-m-d l', mktime(0, 0, 0, date('m')+$diffMonth, date('d') +$diffDay , date('Y')+$diffYear));
	$curr_date=date('Y-m-d', mktime(0, 0, 0, date('m')+$diffMonth, date('d') + $diffDay , date('Y')+$diffYear));	
	$day=date('l', mktime(0, 0, 0, date('m')+$diffMonth, date('d') + $diffDay , date('Y')+$diffYear));	
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
				for($c=0;$c<6;$c++){
		?>
		
<td style="background:lightgreen;padding: 16px 5px;width: 200px;">
<select name="<?='fhour'.$i.$c?>">
<option value="">H</option>
<?php
for($j=1;$j<13;$j++){
?>
<option value="<?=$j?>"><?=$j?></option>
<?php
}
?>
</select>&nbsp;<span>:</span>
<input type="text" id="<?='fminutes'.$i?>" name="<?='fminutes'.$i.$c?>" placeholder="MM" min="0" max="59" style="height:20px;width:40px;" />
<select id="<?='fperiod'.$i?>" name="<?='fperiod'.$i.$c?>">
<option value="AM">AM</option>
<option value="PM">PM</option>
</select>
<br>

<select name="<?='thour'.$i.$c?>">
	<option value="">H</option>
<?php
for($j=1;$j<13;$j++){
?>
<option value="<?=$j?>"><?=$j?></option>
<?php
}
?>
</select>&nbsp;<span>:</span>
<input type="text" id="<?='tminutes'.$i?>" name="<?='tminutes'.$i.$c?>" placeholder="MM" min="0" max="59" style="height:20px;width:40px;"/>
<select id="<?='tperiod'.$i?>" name="<?='tperiod'.$i.$c?>">
<option value="AM">AM</option>
<option value="PM">PM</option>
</select>
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
<th colspan="6"><br><button onclick="fill the form" id="<?='but'?>" style="width:100px;height:30px;background-color:lightgreen;border:none;border-radius:5px;box-shadow:black 2px 2px 2px;">Set</button><br></th>
</tr>
</table>
</form>
<a href="make_schedule.php" style="float:left; font-size: 17px" class="btn btn-primary"><< previous</a>
<a href="make_next_schedule.php?date=<?=date('Y-m-d', mktime(0, 0, 0, date('m')+$diffMonth, date('d') +$diffDay , date('Y')+$diffYear));?>" style="float:right; font-size: 17px" class="btn btn-primary">next >></a>
<?php
}
?>