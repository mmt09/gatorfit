<!DOCTYPE html>
<html>
<head>
 <title>Table with database</title>
 <style>
  table {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
     } 
  th {
   background-color: #588c7e;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
</head>
<body>
 <table>
 <tr>
  <th>First Name</th> 
  <th>Last Name</th> 
  <th>Certification</th>
 </tr>
 <?php
$host    = "localhost";
$user    = "root";
$pass    = "password";
$db_name = "fitness_center";

//create connection
$conn = mysqli_connect($host, $user, $pass, $db_name);

//test if connection failed
if(mysqli_connect_errno()){
    die("connection failed: "
        . mysqli_connect_error()
        . " (" . mysqli_connect_errno()
        . ")");
}

  $sql = "SELECT first_name, last_name, certification FROM trainer";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["first_name"]. "</td><td>" . $row["last_name"] . "</td><td>"
. $row["certification"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>