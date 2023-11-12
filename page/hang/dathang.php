<?php
    if(isset($_POST['order'])){
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $uid=$_COOKIE['uid'];
        $masp=$_POST['masp'];
        $id_donhang=rand(0,10000000);

        $sql="insert into order_us (id_order,name, phone, address,total,uid,masp) values ('$id_donhang','$name', '$phone', '$address',20000,'$uid','$masp')"; 
        $conn->query($sql);


    }
?>
<h3>Dat Hang</h3>


<div class="main-dathang">
    
        <?php 
            $sql = "SELECT * FROM order_us inner join cars on order_us.masp like cars.id where order_us.uid='$uid'";
            if($r=mysqli_query($conn,$sql)){
                if(mysqli_num_rows($r)){
                    while($row=mysqli_fetch_array($r)){
                        ?>
                            <div class="main-dathang-hinh">
                                <img src="image/<?php echo $row['image']?>" alt="">
                            </div>
                            <div class="main-dathang-thongtin">
                                
                            </div>
                        <?php
                    }
                }
            }
        ?>
    
</div>


