<?php
require_once 'connect.php';
$SoThe = $_GET['id'];
echo $SoThe;
$query = "SELECT * FROM thethuvien WHERE SoThe = ?";
$statement = $pdo->prepare($query);
$statement->execute([$SoThe]);
$readerCard = $statement->fetch(PDO::FETCH_ASSOC);
print_r($readerCard);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $SoThe = $_POST['id'];
    $NgayBatDau = $_POST['NgayBatDau'];
    $NgayHetHan = $_POST['NgayHetHan'];
    $GhiChu = $_POST['GhiChu'];

    $query_update = "UPDATE thethuvien SET  NgayBatDau = ?, NgayHetHan = ?, GhiChu = ? WHERE SoThe = ?";
    $statement_update = $pdo->prepare($query_update);
    $statement_update->execute([$NgayBatDau, $NgayHetHan, $GhiChu, $SoThe]);
    header("Location: thethuvien.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thẻ thư viện</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #0056b3;
            color: white;
            border: none;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">Chỉnh sửa thẻ thư viện</h2>
            </div>
            <div class="card-body">
                <form method="post" class="col-md-6 offset-md-3" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $SoThe ?>">
                    <div class="form-group">
                        <label for="NgayBatDau">Ngày bắt đầu</label>
                        <input type="date" name="NgayBatDau" class="form-control<?= isset($errors['NgayBatDau']) ? ' is-invalid' : '' ?>" id="NgayBatDau" value="<?php echo $readerCard['NgayBatDau'] ?>" />
                    </div>
                    <div class="form-group">
                        <label for="NgayHetHan">Ngày hết hạn</label>
                        <input type="date" name="NgayHetHan" class="form-control<?= isset($errors['NgayHetHan']) ? ' is-invalid' : '' ?>" id="NgayHetHan" value="<?php echo $readerCard['NgayHetHan'] ?>" />

                    </div>
                    <div class="form-group">
                        <label for="GhiChu">Ghi chú</label>
                        <textarea name="GhiChu" id="GhiChu" class="form-control<?= isset($errors['GhiChu']) ? ' is-invalid' : '' ?>" placeholder="Nhập ghi chú"><?php echo $readerCard['GhiChu'] ?></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Cập nhật thẻ thư viện</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>