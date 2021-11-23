<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="assets\style.css">
</head>
<body>
<?php
echo "<table class='table container' style='border: solid 1px white;'>";
echo "<tr><th>Average</th></tr>";

class TableRows extends RecursiveIteratorIterator {
   function __construct($it) {
       parent::__construct($it, self::LEAVES_ONLY);
   }

   function current() {
       return "<td class='table-dark' style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
   }

   function beginChildren() {
       echo "<tr>";
   }

   function endChildren() {
       echo "</tr>" . "\n";
   }
}

$servername = "localhost";
$username = "root";
$password = "abcd";

try {
  $conn = new PDO("mysql:host=$servername;dbname=websys_quiz", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT AVG(items.price * (1 - discounts.discount)) FROM items INNER JOIN discounts ON items.id = discounts.id");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


echo "</table>";
?>
</body>