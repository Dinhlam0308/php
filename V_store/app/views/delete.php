<?php
include '../configs/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM item_sale WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);


    header("Location: index.php");
    exit;
} else {
    die("ID mặt hàng không được cung cấp.");
}

?>