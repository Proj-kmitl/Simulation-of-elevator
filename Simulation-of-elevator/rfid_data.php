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

echo "Insertion Success!<br>";

?>
</body>
</html>