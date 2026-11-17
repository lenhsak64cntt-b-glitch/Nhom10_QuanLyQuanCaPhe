
<?php
require_once "ket-noi.php";

// Lấy danh sách sản phẩm và tên danh mục
$sql = "SELECT sanpham.MaSP, sanpham.TenSP, sanpham.DonGia,
               danhmuc.TenDM
        FROM sanpham
        INNER JOIN danhmuc ON sanpham.MaDM = danhmuc.MaDM
        ORDER BY sanpham.MaSP DESC";

$stmt = $conn->prepare($sql);
$stmt->execute();

$danhSach = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f0e8;
            color: #493326;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        h1 {
            text-align: center;
            color: #70452d;
        }

        .add-button {
            display: inline-block;
            padding: 12px 18px;
            background: #795238;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            margin: 15px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 13px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #795238;
            color: white;
        }

        tr:nth-child(even) {
            background: #f8f3ed;
        }

        .empty {
            text-align: center;
            padding: 20px;
            color: #888;
        }
    </style>
</head>

<body>
<div class="container">

    <h1>☕ DANH SÁCH SẢN PHẨM</h1>

    <a class="add-button" href="them-san-pham.php">
        + Thêm sản phẩm
    </a>

    <table>
        <tr>
            <th>Mã SP</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Danh mục</th>
        </tr>

        <?php if (count($danhSach) > 0) { ?>

            <?php foreach ($danhSach as $sp) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($sp["MaSP"]); ?></td>

                    <td><?php echo htmlspecialchars($sp["TenSP"]); ?></td>

                    <td>
                        <?php echo number_format($sp["DonGia"], 0, ',', '.'); ?> VNĐ
                    </td>

                    <td><?php echo htmlspecialchars($sp["TenDM"]); ?></td>
                </tr>
            <?php } ?>

        <?php } else { ?>

            <tr>
                <td colspan="4" class="empty">
                    Chưa có sản phẩm nào!
                </td>
            </tr>

        <?php } ?>
    </table>

    <p>
        <a href="index.php">← Quay về trang chủ</a>
    </p>

</div>
</body>
</html>
