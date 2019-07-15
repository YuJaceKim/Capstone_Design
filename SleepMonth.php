<?php
include("Connect.php");


$dogID=isset($_GET['dogID']) ? $_GET['dogID'] : '';
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL + 0 month) ,'%y-%m'),'-1'),'%Y-%m') FROM Sleeps WHERE date_format(startTime, '%Y-%m-%d') BETWEEN DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL + 0 month) ,'%Y-%m'),'-1'),'%Y-%m-%d') AND last_day(now()) AND dogID = '$dogID'";
// 한 달 치의 Step 총합을 가져온다.
TmonthOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -1 month) ,'%Y-%m'),'-1'),'%Y-%m') FROM Sleeps WHERE date_format(startTime, '%Y-%m-%d') BETWEEN DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -1 month) ,'%Y-%m'),'-1'),'%Y-%m-%d') AND last_day(DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -1 month) ,'%Y-%m'),'-1'),'%Y-%m-%d')) AND dogID = '$dogID'";
TmonthOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -2 month) ,'%Y-%m'),'-1'),'%Y-%m') FROM Sleeps WHERE date_format(startTime, '%Y-%m-%d') BETWEEN DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -2 month) ,'%Y-%m'),'-1'),'%Y-%m-%d') AND last_day(DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -2 month) ,'%Y-%m'),'-1'),'%Y-%m-%d')) AND dogID = '$dogID'";
TmonthOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -3 month) ,'%Y-%m'),'-1'),'%Y-%m') FROM Sleeps WHERE date_format(startTime, '%Y-%m-%d') BETWEEN DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -3 month) ,'%Y-%m'),'-1'),'%Y-%m-%d') AND last_day(DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -3 month) ,'%Y-%m'),'-1'),'%Y-%m-%d')) AND dogID = '$dogID'";
TmonthOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -4 month) ,'%Y-%m'),'-1'),'%Y-%m') FROM Sleeps WHERE date_format(startTime, '%Y-%m-%d') BETWEEN DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -4 month) ,'%Y-%m'),'-1'),'%Y-%m-%d') AND last_day(DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -4 month) ,'%Y-%m'),'-1'),'%Y-%m-%d')) AND dogID = '$dogID'";
TmonthOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -5 month) ,'%Y-%m'),'-1'),'%Y-%m') FROM Sleeps WHERE date_format(startTime, '%Y-%m-%d') BETWEEN DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -5 month) ,'%Y-%m'),'-1'),'%Y-%m-%d') AND last_day(DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -5 month) ,'%Y-%m'),'-1'),'%Y-%m-%d')) AND dogID = '$dogID'";
TmonthOutput($link, $sql);
$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, startTime, endTime)), DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -6 month) ,'%Y-%m'),'-1'),'%Y-%m') FROM Sleeps WHERE date_format(startTime, '%Y-%m-%d') BETWEEN DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -6 month) ,'%Y-%m'),'-1'),'%Y-%m-%d') AND last_day(DATE_FORMAT(CONCAT(DATE_FORMAT( date_add(now(), INTERVAL -6 month) ,'%Y-%m'),'-1'),'%Y-%m-%d')) AND dogID = '$dogID'";
TmonthOutput($link, $sql);

function TmonthOutput($link, $sql){

	if ($result = mysqli_query($link,$sql))
	{
		
		$rows = mysqli_fetch_array($result);
		$StepData = $rows[0];
		$DayData = $rows[1];
		$Day = date("d");
		if($StepData)
		{
		// 한 달의 평균치 계산
			$calc = $StepData;
			// 소수점 버리고 출력
			echo floor("$calc");
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
