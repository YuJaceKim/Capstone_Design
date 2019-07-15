<?php
include("Connect.php");

//$userID='Jiyun';
//$PASSWORD='babo';

$userID=isset($_GET['userID']) ? $_GET['userID'] : '';
$sql = "SELECT Dogs.dogID FROM Users, Dogs WHERE Users.userID = Dogs.userID AND Users.userID = '$userID'";
// userID에 해당하는 userID와 nickName을가져온다.

if ($result = mysqli_query($link,$sql))
{
	
	$rows = mysqli_fetch_array($result);
	$dogIDData = $rows[0];
	if($dogIDData)
	{
		echo "$dogIDData";
	}
}
else
{
	echo "SQL문 처리중 에러발생 : ";
}
?>
