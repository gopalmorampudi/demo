<?php
session_start();
include "DBConnection.php";
$iCount=$_REQUEST['icount'];
$BigArray=array();
$counter=0;
for($i=0;$i<$iCount;$i++){

	for($k=0;$k<6;$k++){
	$fhour=$_REQUEST['fhour'.$i.$k];
	$fminutes=$_REQUEST['fminutes'.$i.$k];
	if($fminutes == "")
	{
		$fminutes = "00";
	}
	$fperiod=$_REQUEST['fperiod'.$i.$k];
	$fhm=$fhour.":".$fminutes." ".$fperiod;
	$fhm1=date("H:i", strtotime($fhm));
	$thour=$_REQUEST['thour'.$i.$k];
	$tminutes=$_REQUEST['tminutes'.$i.$k];
	if($tminutes == "")
	{
		$tminutes = "00";
	}
	$tperiod=$_REQUEST['tperiod'.$i.$k];
	$ftm=$thour.":".$tminutes." ".$tperiod;
	$ftm1=date("H:i", strtotime($ftm));
	$date=$_REQUEST['date'.$i];
	$day=$_REQUEST['day'.$i];
	
		
	$testQuery="SELECT * FROM schedule where date_col ='$date'";
	$res=mysql_query($testQuery);
		
	$rowcount=mysql_num_rows($res);	
		$count = 0;
		if($res){
				
				while($result=mysql_fetch_array($res)){	
					 
					$dbFhour=$result['fhour'];
					$dbFmin=$result['fminutes'];
					$dbFperiod=$result['fperiod'];
					if($dbFmin<10){
						$dbFmin="0".$dbFmin;
					}
					//$dbfhm=$dbFhour.$dbFmin;
					
					$dbfhm=$dbFhour.":".$dbFmin." ".$dbFperiod;
					
					$dbfhm1=date("H:i", strtotime($dbfhm));
					$dbThour=$result['thour'];
					$dbTmin=$result['tminutes'];
					if($dbTmin<10){
						$dbTmin="0".$dbTmin;
					}
					$dbTperiod=$result['tperiod'];
					
					$dbftm=$dbThour.":".$dbTmin." ".$dbTperiod;
					
					$dbftm1=date("H:i", strtotime($dbftm));

					
					if(($fhm1 >= $dbfhm1 && $fhm1 < $dbftm1))
					{
						$count++;
					}
					else if(($ftm1 > $dbftm1 && $ftm1<= $dbftm1))
					{
						$count++;
					}
					else if(($dbfhm1 >= $fhm1 && $dbfhm1 < $ftm1))
					{
						$count++;
					}
					else if($dbftm1 > $fhm1 && $dbftm1 <= $ftm1)
					{
						$count++;				
					}
					else if($fhm1 == $ftm1){
						$count++;
					}
				}
			
		}
		if($count > 0)
			{
				//echo "please check the timings you have entered";
				$_SESSION['flag']='invalid';
		    	header('Location: make_schedule.php?hiii');
			}
			
		else{
				if($fhour !=0 && $thour !=0){
					
				$query="insert into schedule(date_col,week_day,fhour,fminutes,fperiod,thour,tminutes,tperiod) values('$date','$day',$fhour,$fminutes,'$fperiod',$thour,$tminutes,'$tperiod')";
	$results=mysql_query($query);	
		if($results){
			$counter++;
		}
			}
		}
	}
}
if($counter!=0){
		$_SESSION['flag']='success';
		header('Location: make_schedule.php?hello');
	}else{
		$_SESSION['flag']='invalid';
		header('Location: make_schedule.php');
	}
?>