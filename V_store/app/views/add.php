<?php
include '../configs/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $expried_date = $_POST['expried_date'];
    $note = $_POST['note'];

    // Thêm dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO item_sale (item_code, item_name, quantity, expried_date, note) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt->execute([$item_code, $item_name, $quantity, $expried_date, $note])) {
        echo "<script>alert('Thêm sản phẩm thành công!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Có lỗi xảy ra. Vui lòng thử lại!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item</title>
    <link rel="stylesheet" href="/V_store/app/assets/css/add.css">
</head>
<body>

<div class="form-container">
    <h2>Add new</h2>
    <form method="post" action="">
        <label for="item_code">Item Code:</label>
        <input type="text" id="item_code" name="item_code" required>

        <label for="item_name">Item Name:</label>
        <input type="text" id="item_name" name="item_name" required>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>

        <label for="expried_date">Expried date:</label>
        <input type="date" id="expried_date" name="expried_date" required>

        <label for="note">Note:</label>
        <input type="text" id="note" name="note">

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
