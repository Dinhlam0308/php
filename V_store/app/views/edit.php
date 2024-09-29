<?php
include '../configs/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT id, item_code, item_name, quantity, expried_date, note FROM item_sale WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$item) {
        die("Không tìm thấy mặt hàng.");
    }
} else {
    die("ID mặt hàng không được cung cấp.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $expried_date = $_POST['expried_date'];
    $note = $_POST['note'];
    $sql = "UPDATE item_sale SET item_code = ?, item_name = ?, quantity = ?, expried_date = ?, note = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$item_code, $item_name, $quantity, $expried_date, $note, $id]);


    header("Location: index.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" href="/V_store/app/assets/css/add.css">
</head>
<body>
<h1>Edit</h1>
<form method="post">
    <label for="item_code">Item Code:</label>
    <input type="text" id="item_code" name="item_code" value="<?php echo htmlspecialchars($item['item_code']); ?>" required>

    <label for="item_name">Item Name:</label>
    <input type="text" id="item_name" name="item_name" value="<?php echo htmlspecialchars($item['item_name']); ?>" required>

    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" value="<?php echo htmlspecialchars($item['quantity']); ?>" required>

    <label for="expired_date">Expried date:</label>
    <input type="date" id="expired_date" name="expried_date" value="<?php echo htmlspecialchars($item['expired_date']); ?>" required>

    <label for="note">Note:</label>
    <textarea id="note" name="note"><?php echo htmlspecialchars($item['note']); ?></textarea>

    <button type="submit">Update</button>
</form>
</body>
</html>
