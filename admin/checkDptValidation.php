<?php
include "DBConnection.php";
$mail=$_GET['mail'];
		 $query="select count(1) as cnt from departments where emailid='$mail'";
		$results=mysql_query($query);
		$count=0;
		if($row=mysql_fetch_array($results))
		{
			 $count+=$row['cnt'];	
		}
		if($count>0)
		{
			echo 'exists';	
		}else{
			echo 'ok';
		}
?>