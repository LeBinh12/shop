<div class="logo-shop">
    <h1>
        BIN
    </h1>
</div>

<div class="menu">
    <ul>
        <li><a href="index.php" class="fa fa-home">Trang chu</a></li>
        <li class="trademark"><a href="#" class="fa fa-car">thuong hieu</a>
            <ul >
                <?php
                    $sql="SELECT * FROM brands WHERE brands_id";
                    $r=mysqli_query($conn, $sql);
                   if($r){
                        if(mysqli_num_rows($r)>0){
                            while($row=mysqli_fetch_array($r)){
                                ?>
                                    <li>
                                        <a href="#" class="font"><?php echo $row["name"]?></a>
                                    </li>
                                    

<?php
                            }

                        }
                   }
                ?>


            
            </ul>
        </li>
        <li><a href="#">Xe may </a>
            
        </li>
        <li><a href="#">Tin tuc</a></li>
        <li><a href="#">Khuyen mai</a></li> 
        <li><a href="index.php?page=page/hang/giohang.php&&$_COOKIE['uid']" class="fa fa-cart">Gio Hang</a></li>
    </ul>
</div>
<form action="index.php?page=page/sanpham/sanphamtimkiem.php" method="post">
<div class="search">
    <input name="search" type="text" placeholder="tim kiem...">
    <button><i class="fa fa-search"></i></button>
</div>
</form>