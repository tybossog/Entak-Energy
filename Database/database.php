<?php

$servername = "localhost";
$username = "root";
$password = "cosmogarri";
$dbname = "EntakDb";

//create database
try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE $dbname";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Database created successfully<br>";

} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

//create user table
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to create table
  $sql = "CREATE TABLE Users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  phone INT(11) NOT NULL,
  password VARCHAR(30) NOT NULL,
  address VARCHAR(30) NOT NULL,
  gender VARCHAR(30) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Table Users created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

//insert test data


 ?>
