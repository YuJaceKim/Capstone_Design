<?php
include("Connect.php");


$dogID=isset($_GET['dogID']) ? $_GET['dogID'] : '';
$sql = "SELECT feeling FROM Unite WHERE dogID = '$dogID' ORDER BY e_Time DESC limit 1";
// 가장 최근 감정값 가져오기.
// 최종 종합된 데이터

if ($result = mysqli_query($link,$sql))
{
	
	$rows = mysqli_fetch_array($result);
	$feelData = $rows[0];
	if($feelData)
	{
		echo "$feelData";
	}
	else
	{
		echo "0";
	}
}
else
{
	echo "SQL문 처리중 에러발생 : ";
}
?>
