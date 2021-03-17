<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  
</head>
<body> -->
<?php
  header('Location: login.php?redirect=index.php');
  extract($_POST);
  

  //check if username and password field is blank.
  if(!$USERNAME || !$PASSWORD){
    fieldsBalnk();
    die();
  }
  //check if is SET new User

  if(isset($NewUser)){

    if(!($file=fopen("password.txt","a"))){
      print("<title>ERROR</title>");
      die();
    }
    fputs($file,"$USERNAME,$PASSWORD\n");
    userAdded($USERNAME);
  }

  else{

    if(!($file = fopen("password.txt","r"))){
      print("<title>ERROR</title>");
      die();
    }

    $userVerified = 0;

    while(!feof($file) && !$userVerified){

      $line = fgets($file,255);
      $line=chop($line);
      $field = explode(",",$line,2);
      //verify username 
      if($USERNAME == $field[0]){
        $userVerified=1;

        if(checkPassword($PASSWORD, $field)==true)
          accessGranted($USERNAME);
         else
         wrongPassword(); 
      }
    }
      fclose($file);
      if(!$userVerified){
        accessDenied();
        }
  }

      
      function checkPassword($userpassword, $filedata)
      {
        if($userpassword==$filedata[1])
        return true;
        else
        return false;

      }

      function userAdded($name){
        print("<h2>User Added</h2>");
      }

      function accessGranted($name){
        print("<h2>Access Granted</h2>");
        header("location: index.php");
        print("<h2>Access Granted</h2>");
        
      }

      function wrongPassword(){
        print("wrong password");
      }

      function accessDenied(){
        print("Sorry please try again");
      }

      function fieldsBalnk(){
        print("Please fill the blank");
      }
  
 ?>
<!-- // </body>
// </html> -->