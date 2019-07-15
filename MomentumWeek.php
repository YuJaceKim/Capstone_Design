<?php
include("Connect.php");


$dogID=isset($_GET['dogID']) ? $_GET['dogID'] : '';
// 일주일치의 Step 총합을 가져온다.
$sql = "SELECT SUM(m_Step), date_format(now() - interval 7 DAY, '%Y.%m.%d') FROM Momentums WHERE m_Time > (NOW() - INTERVAL 7 DAY) and dogID = '$dogID'";
weekOutput($link, $sql);
$sql = "SELECT SUM(m_Step), date_format(now() - interval 14 DAY, '%Y.%m.%d') FROM Momentums WHERE m_Time > now() - interval 14 DAY and m_Time < now() - INTERVAL 7 DAY and dogID = '$dogID'";
weekOutput($link, $sql);
$sql = "SELECT SUM(m_Step), date_format(now() - interval 21 DAY, '%Y.%m.%d') FROM Momentums WHERE m_Time > now() - interval 21 DAY and m_Time < now() - INTERVAL 14 DAY and dogID = '$dogID'";
weekOutput($link, $sql);
$sql = "SELECT SUM(m_Step), date_format(now() - interval 28 DAY, '%Y.%m.%d') FROM Momentums WHERE m_Time > now() - interval 28 DAY and m_Time < now() - INTERVAL 21 DAY and dogID = '$dogID'";
weekOutput($link, $sql);
$sql = "SELECT SUM(m_Step), date_format(now() - interval 35 DAY, '%Y.%m.%d') FROM Momentums WHERE m_Time > now() - interval 35 DAY and m_Time < now() - INTERVAL 28 DAY and dogID = '$dogID'";
weekOutput($link, $sql);
$sql = "SELECT SUM(m_Step), date_format(now() - interval 42 DAY, '%Y.%m.%d') FROM Momentums WHERE m_Time > now() - interval 42 DAY and m_Time < now() - INTERVAL 35 DAY and dogID = '$dogID'";
weekOutput($link, $sql);
$sql = "SELECT SUM(m_Step), date_format(now() - interval 49 DAY, '%Y.%m.%d') FROM Momentums WHERE m_Time > now() - interval 49 DAY and m_Time < now() - INTERVAL 42 DAY and dogID = '$dogID'";
weekOutput($link, $sql);



function weekOutput($link, $sql){
	if ($result = mysqli_query($link,$sql))
	{
		
		$rows = mysqli_fetch_array($result);
		// 일주일치 계산
		$StepData = $rows[0];
		$DayData = $rows[1];

		if($StepData)
		{
		// 소수점 버리고 출력
			echo floor("$StepData");
			echo "\t";
		}
		else{
			echo "0";
			echo "\t";
		}
		if($DayData)
		{
			echo "$DayData";
			echo "\t";
		}
	}
	else
	{
		echo "SQL문 처리중 에러발생 : ";
	}
}
?>
