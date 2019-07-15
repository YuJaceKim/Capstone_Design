<?php
include("Connect.php");

/*
$link=mysqli_connect("xogml658.dothome.co.kr", "xogml658", "1q2w3e4r^%*", "xogml658");
if (!$link)
{
        echo "MySQL 접 속 에 러 : ";
        echo mysqli_connect_error();
        exit();
}
mysqli_set_charset($link, "utf8");
*/

$dogID=isset($_GET['dogID']) ? $_GET['dogID'] : '';
$sql = "SELECT feeling FROM Emotions WHERE dogID = '$dogID' ORDER BY e_Time DESC limit 1";
// 가장 최근 감정값 가져오기.
// 영상+음성 처리해서 종합된 데이터

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
