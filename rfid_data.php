<html>
<body>

<?php
include_once "config.php";

if(!$connect){
	echo "Error: " . mysqli_connect_error();
	exit();
}

echo "Connection Success!<br><br>";
$delete = "DELETE FROM rfiddata";
$delresult = mysqli_query($connect,$delete);

$rfid_id = $_GET["rfid_id"];

$query = "INSERT INTO rfiddata (RFID_ID) VALUES ('$rfid_id')";
$result = mysqli_query($connect,$query);

$query2 = "INSERT INTO rfid_input (rfid_id) VALUES ('$rfid_id')";
$result2 = mysqli_query($connect,$query2);


$select = "SELECT rfid_input.*, users.* FROM rfid_input INNER JOIN users ON rfid_input.rfid_id = users.rfid_id ";
$select_result = $connect->query($select);
while($row = $select_result->fetch_assoc()){
	$rfidid = $row['rfid_id'];
	$id = $row['id'];
	$name = $row['name'];
	$floor = $row['floor'];
	$times = $row['times'];

	// $sqll = "INSERT INTO user_history(rfid_id, id, name, from, to, date)
    //                         VALUES ('$rfid_id', '$id', '$name', '$floor', '$floor', '$times')";	
    // $resultt = mysqli_query($connect,$sqll);	


	$delete_select = "DELETE FROM rfid_input";
	$deleteresult = mysqli_query($connect,$delete_select);

	


	echo "$rfidid , $name, $times <br>";
	// $query4 = "INSERT INTO test1 (test,test2,test3,test4,test5,test6) VALUES ('$rfid_id','$id','$name','1','$floor','$times')";
	// $result4 = mysqli_query($connect,$query4);

	$query5 = "INSERT INTO user_history (id,`name`,`from`,`to`,`date`) VALUES ('$id','$name','1','$floor','$times')";
	$result5 = mysqli_query($connect,$query5);
}

echo "Insertion Success!<br>";


?>
</body>
</html>