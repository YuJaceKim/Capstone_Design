<?php
include("Connect.php");


$dogID=isset($_GET['dogID']) ? $_GET['dogID'] : '';
$sql = "SELECT dogName FROM Dogs WHERE dogID = '$dogID'";

if ($result = mysqli_query($link,$sql))
{
	
	$rows = mysqli_fetch_array($result);
	$dognameData = $rows[0];
	if($dognameData)
	{
		echo "$dognameData";
	}
	else{
		echo "등록된 반려견이 없습니다.";
	}
}
else
{
	echo "SQL문 처리중 에러발생 : ";
}
?>
