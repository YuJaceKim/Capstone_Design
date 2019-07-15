<?php 
include("Connect.php");




$userID=isset($_POST['userID']) ? $_POST['userID'] : ''; 
$passWord=isset($_POST['passWord']) ? $_POST['passWord'] : ''; 
$nickName=isset($_POST['nickName']) ? $_POST['nickName'] : ''; 
$phoneNumber=isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : ''; 
$userMail=isset($_POST['userMail']) ? $_POST['userMail'] : '';
$phoneNumber = add_hyphen($phoneNumber);

// 전화번호의 숫자만 취한 후 중간에 하이픈(-)을 넣는다.
function add_hyphen($phoneNumber)
{
    $phoneNumber = preg_replace("/[^0-9]/", "", $phoneNumber);    // 숫자 이외 제거
	if (substr($phoneNumber,0,2)=='02')
	    return preg_replace("/([0-9]{2})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", $phoneNumber);
	else if (strlen($phoneNumber)=='8' && (substr($phoneNumber,0,2)=='15' || substr($phoneNumber,0,2)=='16' || substr($phoneNumber,0,2)=='18'))
	// 지능망 번호이면
	    return preg_replace("/([0-9]{4})([0-9]{4})$/", "\\1-\\2", $phoneNumber);
	else
	    return preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", $phoneNumber);
}



if ($userID !="" and $passWord !="" and $nickName !="" and $phoneNumber !="" and $userMail !=""){
      $sql="INSERT INTO Users(userID, passWord, nickName, phoneNumber, userMail) VALUES('$userID','$passWord', '$nickName', '$phoneNumber', '$userMail')";
    $result=mysqli_query($link,$sql);
    if($result){
       echo "Create success";
    }  
    else{
       echo "Create fail";
       echo mysqli_error($link);
    } 
 
} else {
    echo "No data";
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
        userID: <input type = "text" name = "userID" />
        passWord: <input type = "text" name = "passWord" />
		nickName: <input type = "text" name = "nickName" />
		phoneNumber: <input type = "text" name = "phoneNumber" />
		userMail: <input type = "text" name = "userMail" />
         <input type = "submit" />
      </form>
   
   </body> 
</html> 
<?php
}
?>
