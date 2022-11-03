<?php
	require_once "config.php";
	
	$sql = "SELECT * FROM user_history ORDER BY date DESC";
    $result = $connect->query($sql);
	//$intNumField = $result->num_fields();
	$resultArray = array();
	$historyArray = array();
    $fieldinfo = $result -> fetch_fields();
    $arrCol = array();
	while($row = $result->fetch_assoc())
	{
		$id = $row['id'];
        $name = $row['name'];
        $from = $row['from'];
        $to = $row['to'];
        $date = $row['date'];

        $resultArray[] = array("id" => $id, "name" => $name, "from" => $from, "to" => $to, "date" => $date); 

		
	}
	
	//mysql_close($objConnect);
	
	echo json_encode($resultArray);

    ?>