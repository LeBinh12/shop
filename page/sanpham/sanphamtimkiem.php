<?php
    if (isset($_POST['search'])) {
        $idtk=$_POST['search'];
    }
?>

<h1>Sản Phẩm tìm kiếm</h1><br>
<div class="container">
    
    <div class="menu-thongtin">
    <?php    

            $data=search($idtk,$conn);
            for ($i=0; $i < count($data); $i++){
                    ?>
                    <div class="menu-img">
                    <a href="index.php?page=page/sanpham/chitiet.php&idct=<?php echo $data[$i]["id"]?>"><img src="image/<?php echo $data[$i]['image']?>" alt=""></a> 
                    <a href="index.php?page=page/sanpham/chitiet.php&idct=<?php echo $data[$i]["id"]?>"><?php echo $data[$i]['brand']?></a>
                    <a href="index.php?page=page/sanpham/chitiet.php&idct=<?php echo $data[$i]["id"]?>"><?php echo $data[$i]['price']?></a>
                    <style>
                        img{
                            width: 300px;
                        }
                        .menu-thongtin{
                            display: flex ;
                            flex-wrap: wrap;
                        }
                    </style>
                </div>
            
                    <?php
                }
            
           
        
        ?>
    </div>
</div>