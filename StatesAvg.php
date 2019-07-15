<?php
include("Connect.php");


$dogID=isset($_GET['dogID']) ? $_GET['dogID'] : '';
$sql = "SELECT AVG(pulse), AVG(temperature) FROM States WHERE states_Time > (NOW() - INTERVAL 1 MONTH) and dogID = '$dogID'";
// 한 달 치의 Step 총합을 가져온다.
StatesOutput($link, $sql);

function StatesOutput($link, $sql){
	if ($result = mysqli_query($link,$sql))
	{
		
		$rows = mysqli_fetch_array($result);
		$pulseData = $rows[0];
		$temperatureData = $rows[1];
		if($pulseData)
		{
		// 한 달의 평균치 계산
			echo floor("$pulseData");
			echo "\t";
		}
		else{
			echo "0";
			echo "\t";
		}
		if($temperatureData)
		{
			echo floor("$temperatureData");
			echo "\t";
		}
		else{
			echo"0";
			echo "\t";
		}
	}
	else
	{
		echo "SQL문 처리중 에러발생 : ";
	}
}
