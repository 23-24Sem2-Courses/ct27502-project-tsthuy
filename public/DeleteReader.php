<?php
require_once "connect.php";
// Kiểm tra xem có yêu cầu POST được gửi đi không và có tồn tại ID của độc giả không
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Lấy ID của độc giả từ yêu cầu POST
    $id = $_POST['id'];
    $sql = "DELETE from docgia where MaDocGia = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        $id
    ]);;
    header('Location: reader.php');
}
