<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
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

$sql = "SELECT * FROM patient LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $name = htmlspecialchars($row["name"], ENT_QUOTES);
      $imageData = base64_encode($row["picture"]);
      echo $name . ", " . $row["gender"] . "/" . $row["age"] . "  <img src='data:image/jpeg;base64," . $imageData . "'/><br>";
      echo "<span class='patient-id'>Patient ID: " . $row["patientID"] . "</span>";
    }
  } else {
    echo "0 results";
  }
$conn->close();
?>

</body>
</html>