<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "PhpCrud";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

try {
    $dd = $_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM user WHERE uname = ?");
    
    $stmt->bind_param("s", $dd); 

    $stmt->execute();

    require 'index.php';


    $stmt->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conn->close();
?>
