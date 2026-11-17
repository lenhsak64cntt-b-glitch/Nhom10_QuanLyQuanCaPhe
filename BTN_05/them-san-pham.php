
<?php
require_once "ket-noi.php";

$thongBao = "";
$loi = "";

// Lấy danh sách danh mục
$sql = "SELECT * FROM danhmuc";
$stmt = $conn->prepare($sql);
$stmt->execute();
$danhSachDM = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Khi người dùng nhấn nút thêm sản phẩm
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tenSP = trim($_POST["TenSP"] ?? "");
    $donGia = $_POST["DonGia"] ?? "";
    $maDM = $_POST["MaDM"] ?? "";

    // Kiểm tra dữ liệu
    if ($tenSP == "" || $donGia == "" || $maDM == "") {
        $loi = "Vui lòng nhập đầy đủ thông tin!";
    }
    elseif (strlen($tenSP) > 100) {
        $loi = "Tên sản phẩm không được quá 100 ký tự!";
    }
    elseif (!is_numeric($donGia) || $donGia <= 0) {
        $loi = "Đơn giá phải là số lớn hơn 0!";
    }
    elseif (!ctype_digit((string)$maDM) || $maDM <= 0) {
        $loi = "Vui lòng chọn danh mục hợp lệ!";
    }
    else {
        // Thêm sản phẩm bằng PREPARE
        $sql = "INSERT INTO sanpham (TenSP, DonGia, MaDM)
                VALUES (:tenSP, :donGia, :maDM)";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':tenSP' => $tenSP,
            ':donGia' => $donGia,
            ':maDM' => $maDM
        ]);

        $thongBao = "Thêm sản phẩm thành công!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm - Coffee Shop</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f0e8;
            color: #493326;
        }

        .container {
            width: 90%;
            max-width: 650px;
            margin: 55px auto;
        }

        .form-box {
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        h1 {
            text-align: center;
            color: #70452d;
            margin-bottom: 10px;
        }

        .description {
            text-align: center;
            color: #888;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 13px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 15px;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #9b6846;
        }

        button {
            width: 100%;
            padding: 14px;
            background: #795238;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #563923;
        }

        .message {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            background: #e6f5e9;
            color: #26733a;
        }

        .error {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            background: #ffe9e9;
            color: #b52d2d;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 22px;
            color: #795238;
            text-decoration: none;
        }

        .back:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="form-box">

        <h1>☕ THÊM SẢN PHẨM</h1>

        <p class="description">
            Quản lý sản phẩm quán cà phê
        </p>

        <?php if ($thongBao != "") { ?>
            <div class="message">
                <?php echo htmlspecialchars($thongBao); ?>
            </div>
        <?php } ?>

        <?php if ($loi != "") { ?>
            <div class="error">
                <?php echo htmlspecialchars($loi); ?>
            </div>
        <?php } ?>

        <form method="POST">

            <label>Tên sản phẩm</label>
            <input type="text" name="TenSP"
                   placeholder="Ví dụ: Cà phê sữa"
                   value="<?php echo htmlspecialchars($_POST["TenSP"] ?? ""); ?>">

            <label>Đơn giá (VNĐ)</label>
            <input type="number" name="DonGia"
                   placeholder="Ví dụ: 25000"
                   min="0.01" step="0.01"
                   value="<?php echo htmlspecialchars($_POST["DonGia"] ?? ""); ?>">

            <label>Danh mục sản phẩm</label>
            <select name="MaDM">
                <option value="">-- Chọn danh mục --</option>

                <?php foreach ($danhSachDM as $dm) { ?>
                    <option value="<?php echo $dm["MaDM"]; ?>"
                        <?php
                        if (($_POST["MaDM"] ?? "") == $dm["MaDM"]) {
                            echo "selected";
                        }
                        ?>>
                        <?php echo htmlspecialchars($dm["TenDM"]); ?>
                    </option>
                <?php } ?>

            </select>

            <button type="submit">+ Thêm sản phẩm</button>

        </form>

        <a class="back" href="ds-san-pham.php">
            ← Xem danh sách sản phẩm
        </a>

        <a class="back" href="index.php">
            ← Quay về trang chủ
        </a>

    </div>

</div>

</body>
</html>
