<?php
	require_once "config.php";
	$sql = "SELECT RFID_ID FROM rfiddata";
    $result = $connect->query($sql);
	//$intNumField = $result->num_fields();
	$resultArray = array();
   
	while($row = $result->fetch_assoc())
	{
		$arrCol = array();
        $fieldinfo = $result -> fetch_fields();
        foreach ($fieldinfo as $val) {
            $e = $val -> name;
            //printf("%s\n", $e);
            $arrCol[$e] = $row["RFID_ID"];
            //$arrCol[mysql_field_name($objQuery,$i)] = $obResult[$i];
           array_push($resultArray,$arrCol); 
        }
		
	}
	
	//mysql_close($objConnect);
	
	echo json_encode($resultArray);
?>