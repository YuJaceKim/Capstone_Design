<?php
include("Connect.php");

//$userID = 'Jisu';
$sql = "SELECT * FROM States WHERE states_Time >= SUBDATE(now(), INTERVAL 20 SECOND)";
$result = mysqli_query($link,$sql);
$rows = mysqli_fetch_array($result);
if ($rows > 0)
{
	//userID에 해당하는 가장 최근에 해당하는 맥박, 온도 값 출력
	$userID=isset($_GET['userID']) ? $_GET['userID'] : '';
	$sql = "SELECT pulse, temperature FROM Users, Dogs, States WHERE Users.userID = '$userID' AND Users.userID = Dogs.userID AND Dogs.dogID = States.dogID ORDER BY States_Time DESC limit 1";  
	
	
	
	// userID에 해당하는 pulse와 temperature를 가져온다.
	if ($result = mysqli_query($link,$sql))
	{
		
		$rows = mysqli_fetch_array($result);
		$pulseData = $rows[0];
		$temperatureData = $rows[1];
		if($pulseData)
		{
			echo "$pulseData";
		}
		else
		{
			echo "0";
		}
		echo "\t";
		if($temperatureData)
		{
			echo "$temperatureData";
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

}
else 
{
	echo "noConnected";
}
?>
