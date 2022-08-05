<?php
$do = $_GET['do'] ?? "main";
include "./base.php";
if (!isset($_SESSION['acc'])) {
    to('./login.php');
}
$str = new str($do);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理中心</title>
    <link rel="stylesheet" href="./css/back.css">
</head>

<body>
    <div class="cent bktop">後臺管理</div>
    <!-- 主內容 -->
    <section>
    <div class="main">
        <!-- 選單 -->
        <div class="menu">
            <ul>
                <li><a href="./back.php?do=main">我的圖片</a></li>
                <li><a href="./back.php?do=nav">標題管理</a></li>
                <li><a href="./back.php?do=work">作品集管理</a></li>
                <li><a href="./back.php?do=link">作品集彈出視窗管理</a></li>
                <li><a href="#" id="logout" onclick="logout()">結束登出</a></li>
            </ul>
        </div>
        <!-- 頁面內容 -->
        <div class="mycontent">
            <?php
            $file = "./back/$do.php";
            if (file_exists($file)) {
                include $file;
            } else {
                include "./back/main.php";
            }
            ?>
        </div>
    </div>
    <div id="mmodal">
        <button onclick="cl()" class="closebtn">X</button>
        <div id="modalcontent"></div>
    </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/main.js"></script>
</body>

</html>