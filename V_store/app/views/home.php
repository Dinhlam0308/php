<?php
include '../configs/database.php';

$sql = "SELECT id, item_code, item_name, quantity, expried_date, note FROM item_sale";

try {
    $result = $conn->query($sql);
} catch (PDOException $e) {
    die("Lỗi khi thực hiện truy vấn: " . $e->getMessage());
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Item Code</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Expired Date</th>
        <th>Note</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($result->rowCount() > 0) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["id"]) . "</td>
                    <td>" . htmlspecialchars($row["item_code"]) . "</td>
                    <td>" . htmlspecialchars($row["item_name"]) . "</td>
                    <td>" . htmlspecialchars($row["quantity"]) . "</td>
                    <td>" . htmlspecialchars($row["expried_date"]) . "</td>
                    <td>" . htmlspecialchars($row["note"]) . "</td>
                    <td>
                        <a href='edit.php?id=" . $row["id"] . "' class='edit icon'>✏️</a> |
                        <a href='delete.php?id=" . $row["id"] . "' class='delete icon' onclick=\"return confirm('Bạn có chắc chắn muốn xóa không?');\">🗑️</a>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Không tìm thấy kết quả nào</td></tr>";
    }

    $conn = null;
    ?>
    </tbody>
</table>

</body>
</html>
