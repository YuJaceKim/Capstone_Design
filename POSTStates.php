<?php  
include("Connect.php");


// pulse와 temperature값을 보내기 위해 변수 저장
$pulse=isset($_POST['pulse']) ? $_POST['pulse'] : '';  
$temperature=isset($_POST['temperature']) ? $_POST['temperature'] : '';  
$m_Step=isset($_POST['m_Step']) ? $_POST['m_Step'] : '';	

$current_time = date("Y-m-d H:i:s"); // 날짜도 형식에 맞게 저장
echo date("Y-m-d H:i:s");

 
	// 시간, dogID, pulse, temperature값을 DB에 저장 
    $sql="INSERT INTO States(states_Time, dogID, pulse, temperature) VALUES('$current_time','1', '$pulse', '$temperature')";  
    $result=mysqli_query($link,$sql);  

    if($result){  
    }  
    else{  
       echo "SQL문 처리중 에러 발생 : "; 
       echo mysqli_error($link);
    } 
 

    $sql="INSERT INTO Momentums(m_Time, dogID, m_Step) VALUES('$current_time','1', '$m_Step')";  
    $result=mysqli_query($link,$sql);  

    if($result){  
    }  
    else{  
       echo "SQL문 처리중 에러 발생 : "; 
       echo mysqli_error($link);
    } 



mysqli_close($link);
?>

<?php

$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

if (!$android){
?>

<html>
   <body>
   
      <form action="<?php $_PHP_SELF ?>" method="POST">
        pulse: <input type = "text" name = "pulse" />
        temperature: <input type = "text" name = "temperature" />
		m_Step: <input type = "text" name ="m_Step" />
	
         <input type = "submit" />
      </form>
   
   </body>
</html>
<?php
}
?>
