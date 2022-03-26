<?php

define('ROOT', dirname(__DIR__));

echo ROOT;
require_once(ROOT.'/components/DB.php');
$conn = DB::getConnection();

try {
  $sql = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(50) NOT NULL,
  username VARCHAR(50) NOT NULL,
  pass VARCHAR(255) NOT NULL,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  patronymic VARCHAR(30) NOT NULL
  )";

  $conn->exec($sql);
  echo "Table users created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?> 