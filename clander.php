<html> 
<head>
<script>
            function gotoLastMonth(month, year){
				if(month ==1){
					--year;
					month = 13;
				//	alert(month);
				}
				document.location.href = "<?php  $_SERVER['PHP_SELF']?>?month=" +(month-1)+ "&year=" +year;
				 //window.location.href = "http://www.bing.com";
				}
			
			function gotonextMonth(month, year){
				if(month ==12){
					++year;
					month = 0;
				}
			document.location.href = "<?php  $_SERVER['PHP_SELF']?>?month=" +(month+1)+ "&year=" +year;
				//alert(month);
			//window.location.href = "http://www.bing.com";
				
				}

</script>


</head>

<body>


<?php
	//$date = time();
	if(isset($_GET['day'])){
	$day = $_GET['day'];	   
				   
	}else{
   $day = date('d');
	}

	if(isset($_GET['month'])){
	 	$month= $_GET['month'];
	}else{
  $month = date('m');
	}
	
  if(isset($_GET['year'])){
				 
	$year = $_GET['year'];			 
	
	}else{
  $year =date('Y');
	}
  
  //clander variable 
  $currentTimeStamp = strtotime("$year-$month-$day");
   $monthName = date("F",$currentTimeStamp);
   $numDays = date("t",$currentTimeStamp);
  $counter =0;
 ?>
 
 <table   style="background-color:#CCC; border:1px groove #333">
 
 	<tr>
                    <td> <input type='button' value='<' name='Previous' onClick="gotoLastMonth(<?php echo $month.",".$year; ?>);" /></td>
                    <td colspan="5"><?php echo $monthName ." ".$year?></td>
                    <td><input type='button' value='>' name='Next' onClick="gotonextMonth(<?php  echo $month.",".$year; ?>);" /></td>
    </tr>
    
    <tr>
                    <td style="width:50px; text-align:center; background-color:#090; height:50px;color:#FFF;" >Sun</td>
                    <td style="width:50px; text-align:center; background-color:#960; height:50px;color:#FFF;">Mon</td>
                    <td style="width:50px; text-align:center; background-color:#960;height:50px;color:#FFF;">Tue</td>
                    <td style="width:50px; text-align:center; background-color:#960;height:50px;color:#FFF;">Wed</td>
                    <td style="width:50px; text-align:center; background-color:#960;height:50px;color:#FFF;">Thu</td>
                    <td style="width:50px; text-align:center; background-color:#960;height:50px;color:#FFF;">Fri</td>
                    <td style="width:50px; text-align:center; background-color:#960;height:50px;color:#FFF;">Sat</td>
    </tr>
 <tr>

 <?php
 
//count num of days in a month
for($i =1; $i<$numDays+1; $i++,$counter++){
	$timeStamp = strtotime("$year-$month-$i");
	
	if($i==1){
		$first_day = date("w", $timeStamp);
		
		for($j = 0; $j<$first_day; $j++,$counter++){
		echo "<td>&nbsp;</td>";
		
		}
		}
	if($counter %7==0){
		echo "<tr></tr>";
		
		}
		echo "<td style='width:50px; text-align:center; background-color:#090;height:50px;color:#FFF;'>$i</td>";
		
	}
	
	
	?>
    </td>
   </tr>
 </table>
 
 
</body>
</html>