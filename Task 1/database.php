<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE aa";
    // use exec() because no results are returned
    $conn->exec($sql);
    $conn->exec('USE aa');
    $sql = "CREATE TABLE albums (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30),
  photos INT(64)
  )";
    $conn->exec($sql);
    $sql = "CREATE TABLE photos (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(30),
  url VARCHAR(512),
  album_id INT(64)
  )";

    // use exec() because no results are returned
    $conn->exec($sql);

    echo "Table albums created successfully";
    echo "Table photos created successfully";
    echo "Database created successfully<br>";

} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>