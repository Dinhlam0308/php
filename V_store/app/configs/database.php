<?php
$host = "mysql:host=localhost:3306;dbname=v_store";
$username = "root";
$pass = "HTTN9605dtl";
try {
    $conn = new PDO($host, $username, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    die("Kết nối thất bại: " . $ex->getMessage());
}
?>