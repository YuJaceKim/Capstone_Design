<?php 
include("Connect.php");


$userID=isset($_POST['userID']) ? $_POST['userID'] : ''; 
$pushSet=isset($_POST['pushSet']) ? $_POST['pushSet'] : '';

if ($userID !="" and $pushSet !=""){
      $sql="UPDATE Users SET pushSet = '$pushSet' WHERE userID = '$userID'";
    $result=mysqli_query($link,$sql);
    if($result){
       echo "success";
    }  
    else{
       echo "fail";
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
        pushSet: <input type = "text" name = "pushSet" />
         <input type = "submit" />
      </form>
   
   </body> 
</html> 
<?php
}
?>
