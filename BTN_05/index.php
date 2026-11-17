
<?php
require_once "ket-noi.php";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý quán cà phê</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8f4ee;
            color: #3e2b20;
        }

        header {
            background: #3e2b20;
            color: white;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 25px;
            font-size: 15px;
        }

        nav a:hover {
            color: #e6b77b;
        }

        .hero {
            min-height: 430px;
            padding: 80px 8%;
            display: flex;
            align-items: center;
            background:
                linear-gradient(90deg, rgba(45,29,19,.92), rgba(45,29,19,.25)),
                url("https://images.unsplash.com/photo-1442512595331-e89e73853f31?w=1600")
                center/cover;
            color: white;
        }

        .hero-content {
            max-width: 600px;
        }

        .hero h1 {
            font-size: 46px;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero p {
            font-size: 18px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .button {
            display: inline-block;
            background: #c58b55;
            color: white;
            padding: 14px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .button:hover {
            background: #a96e3c;
        }

        .section {
            padding: 55px 8%;
            text-align: center;
        }

        .section h2 {
            font-size: 30px;
            margin-bottom: 12px;
            color: #593c2b;
        }

        .section-description {
            color: #81766d;
            margin-bottom: 35px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .card {
            background: white;
            padding: 30px 20px;
            border-radius: 14px;
            box-shadow: 0 5px 18px rgba(0,0,0,.06);
            transition: .3s;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0,0,0,.1);
        }

        .card .icon {
            font-size: 42px;
            margin-bottom: 15px;
        }

        .card h3 {
            margin-bottom: 12px;
            color: #593c2b;
        }

        .card p {
            color: #81766d;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .card a {
            color: #a96e3c;
            text-decoration: none;
            font-weight: bold;
        }

        .status {
            background: #e7f5e9;
            color: #28763a;
            display: inline-block;
            padding: 10px 18px;
            border-radius: 30px;
            margin-top: 35px;
            font-size: 14px;
        }

        footer {
            background: #3e2b20;
            color: #eee0d1;
            text-align: center;
            padding: 25px;
            line-height: 1.7;
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                gap: 15px;
            }

            nav a {
                margin: 0 8px;
            }

            .hero h1 {
                font-size: 34px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="logo">☕ COFFEE HOUSE</div>

    <nav>
        <a href="index.php">Trang chủ</a>
        <a href="them-san-pham.php">Thêm sản phẩm</a>
        <a href="ds-san-pham.php">Danh sách</a>
    </nav>
</header>

<section class="hero">
    <div class="hero-content">
        <h1>QUẢN LÝ QUÁN CÀ PHÊ</h1>

        <p>
            Hệ thống quản lý sản phẩm quán cà phê.
            Theo dõi thông tin, đơn giá và danh mục
            sản phẩm một cách đơn giản, tiện lợi.
        </p>

        <a href="ds-san-pham.php" class="button">
            Xem sản phẩm
        </a>

        <a href="them-san-pham.php" class="button">
            + Thêm sản phẩm
        </a>
    </div>
</section>

<section class="section">
    <h2>QUẢN LÝ CỬA HÀNG</h2>

    <p class="section-description">
        Các chức năng chính của hệ thống
    </p>

    <div class="cards">

        <div class="card">
            <div class="icon">☕</div>
            <h3>Thêm sản phẩm</h3>
            <p>
                Nhập tên sản phẩm, đơn giá
                và lựa chọn danh mục.
            </p>
            <a href="them-san-pham.php">Thêm ngay →</a>
        </div>

        <div class="card">
            <div class="icon">📋</div>
            <h3>Danh sách sản phẩm</h3>
            <p>
                Xem toàn bộ sản phẩm đã được
                lưu trong cơ sở dữ liệu.
            </p>
            <a href="ds-san-pham.php">Xem danh sách →</a>
        </div>

        <div class="card">
            <div class="icon">🗂️</div>
            <h3>Danh mục sản phẩm</h3>
            <p>
                Phân loại cà phê, trà,
                sinh tố và các loại đồ uống.
            </p>
            <a href="them-san-pham.php">Quản lý sản phẩm →</a>
        </div>

    </div>

    <div class="status">
        ● Kết nối MySQL thành công!
    </div>
</section>

<footer>
    <p>☕ COFFEE HOUSE - HỆ THỐNG QUẢN LÝ QUÁN CÀ PHÊ</p>
    <p>Bài tập PHP & MySQL - BTN_05</p>
</footer>

</body>
</html>
