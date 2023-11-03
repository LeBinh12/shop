<?php 
if(isset($_GET["idct"])){
    $id=$_GET["idct"];
}
?>


<div class="main-chitiet">
    <?php
            $data= getProductDetail($id,$conn);
            for ($i=0;$i<count($data);$i++){
                ?>
                <form action="index.php?page=page/hang/giohang.php&_COOKIE['uid']" method="post">
                <div class="main-chitiet-img">  
                    <img src="image/<?php echo $data[$i]["image"] ?>" alt="">
                </div>
                <div class="main-chitiet-thongtin">
                    <h1><?php echo $data[$i]["brand"] ?></h1>
                    <p><?php echo $data[$i]["description"] ?></p>
                    <h3><?php echo $data[$i]["price"] ?>$</h3>
                    <div class="main-chitiet-button">
                    <input type="hidden" name="id" value="<?php echo $data[$i]["id"]?>">
                    <input type="hidden" name="img" value="image/<?php echo $data[$i]["image"] ?>">
                <input type="hidden" name="brand" value="<?php echo $data[$i]["brand"] ?>">
                
                
                Số lượng:<input  type="number" style="width:7%;text-align:center" id="soluong" name="soluong" min="1" max="100" value="1">

                    <input type="submit" class="btn btn-success" name="giohang" value="Them Gio Hang"></input>
                </div>
                

                </form>
                <form action="index.php?page=page/form/form.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $data[$i]["id"] ?>">

                <input type="submit" class="btn btn-danger" name="dathang" value="Dat Hang"></input>
                </form> 
                <?php
                }
          
    ?>
</div>