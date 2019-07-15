<?php 
include("Connect.php");

//$dogID=isset($_POST['dogID']) ? $_POST['dogID'] : ''; 
$dogAge=isset($_POST['dogAge']) ? $_POST['dogAge'] : ''; 
$dogKind=isset($_POST['dogKind']) ? $_POST['dogKind'] : ''; 
$dogName=isset($_POST['dogName']) ? $_POST['dogName'] : ''; 
$userID=isset($_POST['userID']) ? $_POST['userID'] : '';

if ($dogAge !="" and $dogKind !="" and $dogName !="" and $userID !=""){
      $sql="INSERT INTO Dogs(dogID, dogAge, dogKind, dogName, userID) VALUES('0','$dogAge', '$dogKind', '$dogName', '$userID')";
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
        dogAge: <input type = "text" name = "dogAge" />
		dogKind: <input type = "text" name = "dogKind" />
		dogName: <input type = "text" name = "dogName" />
		userID: <input type = "text" name = "userID" />
         <input type = "submit" />
      </form>
   
   </body> 
</html> 
<?php
}
?>
