<?php
require '../sql_connect.php';

$sql = "SELECT *
FROM faculty f
WHERE f.f_id = '{$_POST['faculty']}'
AND f.f_status = 'Okay'
LIMIT 1";

$result = mysqli_query($conn, $sql);

$pack = array();

while($item = mysqli_fetch_assoc($result)){
	//take each row array and store as single element
	$pack[] = $item;
}
echo json_encode($pack);
?>