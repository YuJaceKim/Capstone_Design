<?php
include("Connect.php");

//$userID='Jiyun';
//$PASSWORD='babo';

$userID=isset($_GET['userID']) ? $_GET['userID'] : '';
$sql = "SELECT userID, nickName FROM Users WHERE userID = '$userID'";
// userID에 해당하는 userID와 nickName을가져온다.

if ($result = mysqli_query($link,$sql))
{
	
	$rows = mysqli_fetch_array($result);
	$nickNamedata = $rows[0];
	$userIDdata = $rows[1];
	if($nickNamedata)
	{
		echo "$nickNamedata";
	}
	echo "\t";
	if($userIDdata)
	{
		echo "$userIDdata";
	}
}
else
{
	echo "SQL문 처리중 에러발생 : ";
}
?>
