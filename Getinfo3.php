<?php
include("Connect.php");

//$userID='Jiyun';
//$PASSWORD='babo';

$userID=isset($_GET['userID']) ? $_GET['userID'] : '';
$sql = "SELECT imgName FROM Users WHERE userID = '$userID'";
// userID에 해당하는 userID와 nickName을가져온다.

if ($result = mysqli_query($link,$sql))
{
	
	$rows = mysqli_fetch_array($result);
	$imgName = $rows[0];
	if($imgName)
	{
		echo "$imgName";
	}
}
else
{
	echo "SQL문 처리중 에러발생 : ";
}
?>
