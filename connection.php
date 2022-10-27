<?php
 
$conn = "";
  
try {
    $servername = "localhost:3306";
    $dbname = "gtech";
    $username = "root";
    $password = "root";
  
    $conn = new PDO(
        "mysql:host=$servername; dbname=gtech",
        $username, $password
    );
     
   $conn->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
 
?>