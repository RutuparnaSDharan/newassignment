<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "medical";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM patient";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $med = $row["history"];

    echo "<table style='border-collapse: collapse;' id='mtable'>";
    echo "<tr><td><img src='ppd.png' id='ppd'></td><td id='medi'>Medical history</td><td id='med'>$med</td></tr>";
    echo "</table>";
  }
 else {
  echo "0 results";
}
$conn->close();
?>

</body>
</html>