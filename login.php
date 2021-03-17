<?php
$msg = null;
session_start();
  if(isset($_POST['submit'])){
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
}
      function checkPassword($userpassword, $filedata)
      {
        if($userpassword==$filedata[1])
        return true;
        else
        return false;

      }
  
    function userAdded($name){
      print("<div style=\"display:flex; flex-direction:column; align-items:center;\" ><div><h4 style=color:red;>User Added</h4></div></div>");
    }

    function accessGranted($name){
      header("location: user_table.php");
      print("<h2>Access Granted</h2>");
      
    }

    function wrongPassword(){
      print("<div style=\"display:flex; flex-direction:column; align-items:center;\" ><div><h4 style=color:red;>wrong password</h4></div></div>");
    }

    function accessDenied(){
      print("<div style=\"display:flex; flex-direction:column; align-items:center;\" ><div><h4 style=color:red;>Sorry please try again</h4></div></div>");
    }

    function fieldsBalnk(){
      print("<div style=\"display:flex; flex-direction:column; align-items:center;\" ><div><h4 style=color:red;>Please fill the blank</h4></div></div>");
    }
 ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="login.php" method="post" accept-charset='UTF-8'>
                            <h3 class="text-center text-info"> Admin Login</h3>
                        
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="USERNAME" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="PASSWORD" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                                <input type="submit" name="NewUser" class="btn btn-info btn-md" value="New User">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="register.php" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
