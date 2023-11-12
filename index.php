<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/lo.css">
    <link rel="stylesheet" href="css/chitiet.css">
    <link rel="stylesheet" href="css/display.css">
    <link rel="stylesheet" href="css/giohang.css">
    <script src="https://kit.fontawesome.com/5fa66840aa.js"></script>
    <title>Document</title>
</head>
<body>
    <?php
    
    require "config/conn.php";
    require "data/function.php"
    ?>


<header id="header">
    <div class="logo">
        <?php
            require "page/head/logo.php";
        ?>
    </div>
    </header>
   <?php
        $uid=$_COOKIE['uid'];
        if($_COOKIE['uid'] == null){
            $uid=rand(0,10000000); 
        }
        // tạo cookies với php
        setcookie('uid',$uid, time() + (86400 * 30), "/");
   ?>
    
    <?php
        if(isset($_GET["page"])){
            require $_GET['page'];
        }
        else{
            require "page/head/display.php";
        }
    ?>

</body>
</html>