<?php

session_start();
if (isset($_POST['submit'])) {
    extract($_POST);

    //check if username and password field is blank.

    $servername = "poonam27371331524.ipagemysql.com";
    $username = "home";
    $password = "Poonam@123";
    if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
        echo 'We don\'t have mysqli!!!';
    } else {
        echo 'Phew we have it!';
    }
    // $link = mysqli_connect('35.193.109.48', 'root', 'poonam2802', 'SplitwiseDb');
    // //Check connection
    // if ($link === false) {
    //     die("ERROR: Could not connect. " . mysqli_connect_error());
    // }

    // //Print host information
    // echo "Connect Successfully. Host info: " . mysqli_get_host_info($link);

    $mysqli = new mysqli('35.193.109.48', 'root', 'poonam2802', 'SplitwiseDb');

    if ($mysqli) {
        echo "Connect Successfully. Host info: " . $mysqli->host_info;
    }
    $_SESSION['mysql_conn'] = $mysqli;
    // $sql = "INSERT INTO Users (first_name, last_name, email) VALUES ('Peter', 'Parker', 'peterparker@mail.com')";
    $sql = "SELECT * FROM `Users`";
    echo "returning something ";

    // echo query($sql);
    // if (query($sql) === false) {
    //     echo "returning false";
    // } else {
    //     echo "returning true";
    // }
    if ($mysqli->query($sql) === true) {
        echo "Records selected successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . $mysqli->errno;
    }


    /* close connection */
    $mysqli->close();
}


function query($sql)
{
    echo "Inside query function 1";
    return (mysqli_query($_SESSION['mysql_conn'], $sql) or die(mysqli_error($_SESSION['mysql_conn'])));
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="Register">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="registerUser.php" method="post">
                            <h3 class="text-center text-info">Register User</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">First Name:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="text" class="text-info">Last Name:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="text" class="text-info">Email:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="text" class="text-info">Home Address:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="text" class="text-info">Home Phone:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="number" class="text-info">Cell Phone:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>