<html>
<body>

<?php
include_once "config.php";

if(!$connect){
	echo "Error: " . mysqli_connect_error();
	exit();
}

echo "Connection Success!<br><br>";
$delete = "DELETE FROM floors";
$delresult = mysqli_query($connect,$delete);

$id = $_GET["id"];
$floor_id = $_GET["floor_id"];

$query = "INSERT INTO floors (id, floor_id) VALUES ('$id', '$floor_id')";
$result = mysqli_query($connect,$query);

echo "Insertion Success!<br>";



?>
</body>
</html>