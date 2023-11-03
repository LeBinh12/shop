<div class="container">
    <div class="model">
        <?php
        $data = brands($conn);
        for ($i = 0; $i < count($data); $i++) {
        ?>

            <p><?php echo $data[$i]["name"] ?></p>
            <hr><br>

            <div class="menu-thongtin">
                <?php

                $product = getProduct($data[$i]["brands_id"], $conn);
                for ($j = 0; $j < count($product); $j++) {
                ?>
                    <div class="menu-img">
                        <a href="index.php?page=page/sanpham/chitiet.php&idct=<?php echo $product[$j]["id"] ?>"><img src="image/<?php echo $product[$j]["image"] ?>" alt=""></a>
                        <a href="index.php?page=page/sanpham/chitiet.php&idct=<?php echo $product[$j]["id"] ?>"><?php echo $product[$j]["brand"] ?></a>
                        <a href="index.php?page=page/sanpham/chitiet.php&idct=<?php echo $product[$j]["id"] ?>"><?php echo $product[$j]["price"] ?>$</a>
                        <style>
                            img {
                                width: 150px;

                            }
                        </style>




                    </div>
                <?php
                }



                ?>
            </div>
        <?php
        }
        ?>
    </div>


</div>