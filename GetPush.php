<?php
include("Connect.php");

//$userID='Jiyun';
//$PASSWORD='babo';

$userID=isset($_GET['userID']) ? $_GET['userID'] : '';
$sql = "SELECT pushSet FROM Users WHERE userID = '$userID'";
// userID에 해당하는 userID와 nickName을가져온다.

if ($result = mysqli_query($link,$sql))
{
	
	$rows = mysqli_fetch_array($result);
	$Push = $rows[0];
	if($Push)
	{
		echo "$Push";
	}
}
else
{
	echo "SQL문 처리중 에러발생 : ";
}
?>
