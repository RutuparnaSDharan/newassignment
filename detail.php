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
    $phone = $row["phone"];
    $email = $row["email"];
    $affected = $row["affected"];
    $conditions = $row["conditions"];
    $speciality = $row["speciality"];

    echo "<table style='border-collapse: collapse;'>";
    echo "<tr><td class='cell'>Phone No.</td><td><img src='phone.png' id='ph'></td><td>$phone</td></tr>";
    echo "<tr><td class='cell'>Mail ID</td><td><img src='mail.png' id='mail'></td><td>$email</td></tr>";
    echo "<tr><td class='cell'>Affected side</td><td><img src='body.png' id='bodyy'></td><td>$affected</td></tr>";
    echo "<tr><td class='cell'>Condition</td><td><img src='condition.jpg' id='cond'></td><td>$conditions</td></tr>";
    echo "<tr><td class='cell'>Speciality</td><td><img src='spe.png' id='spe'></td><td>$speciality</td></tr>";
    echo "</table>";
} else {
    echo "0 results";
}


$conn->close();
?>

</body>
</html>