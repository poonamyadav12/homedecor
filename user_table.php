<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet" media="screen" />
  <title>Document</title>
</head>
<body>
<div style="display:flex; flex-direction:column; align-items:center; width:100%">
<div><h2>Current Users</h2></div>
<div style="width:90%">
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col" class="textalign">#</th>
      <th scope="col" >First Name</th>
      <th scope="col">Last Name</th>
    </tr>
  </thead>
  <?php
            // Opening a file
            $myfile = fopen("user_info.txt", "r");
            $array = array();
            //array_push($array, $x);
            // reading a single line using fgets()
            while (!feof($myfile)) {
              array_push($array, fgets($myfile));
            }
            $len = count($array);
            $num=1;
            // closing the file
            fclose($myfile);
            ?>
  <tbody>
    <?php 
    for($x = 0; $x <$len; $x++){
      $field = explode(" ",$array[$x],2);
    print('<tr>
      <th scope="row">'.$num++.'</th>
      <td>'.$field[0].'</td>
      <td>'.$field[1].'</td>
    </tr>');
    }
    ?>
  </tbody>
</table>
</div>
</div>
</body>
</html>