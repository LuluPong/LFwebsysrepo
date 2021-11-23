<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets\style.css">
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            <div class="input-group-text">Username</div>
            </div>
        <input type="text" class="form-control" name="u_n" id="u_n" placeholder="Enter Here">
        </div>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
            <div class="input-group-text">Password&nbsp;</div>
            </div>
        <input type="password" class="form-control" name="p_w" id="p_w" placeholder="Enter Here">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
<?php
$servername = "localhost";
$username = "root";
$password = "abcd";

try {
  $conn = new PDO("mysql:host=$servername;dbname=websyslab8", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (!empty($_POST["u_n"]) && !empty($_POST["p_w"])) {
    $user = $_POST["u_n"];
    $pass = $_POST["p_w"];

    
    $stmt = $conn->prepare("SELECT `username`, `password` FROM `users` WHERE `username`='jw07 AND `password` = PASSWORD('password4')");
    /*$stmt->bindParam(':user', $user);
    $stmt->bindParam(':pass', $pass);*/
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo $result;
    if ($result > 0) {
        echo " CORRECT!";
    } else {
        echo "YOUR USERNAME OR PASSWORD IS WRONG";
    }

  } else {
    echo "PLEASE ENTER YOUR USERNAME AND PASSWORD";
  }

  

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


?>
</body>
</html>