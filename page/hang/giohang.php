  
<?php
    $uid = $_COOKIE['uid'];

?>


<div class="giohang">
  
  
    <form action="" method="post">
    <?php
  $data=[];
  if($data=getCart($uid,$conn)){
    $sum=0;
  
   for($i=0;$i<count($data);$i++){
          
    $row=$data[$i];
?>
  <div class="giohang-hang">
    <div class="giohang-hinh">
    <img src="image/<?php echo $row['image'] ?>" width="150px" alt="">
    
    </div>
    <div class="giohang-thongtin">
    <div class="giohang-name">
      <b><p><?php echo $row['brand']?></p></b>
    </div>
    <div class="giohang-soluong"> 
      <p>So Luong: <?php echo $row['quantity']?></p>
    </div>
    </div>
    <div class="giohang-chucnang">
      <div class="giohang-xoa">
      <input type="hidden" name="idgiohang" value="<?php echo $row['id_giohang']?>">
      <input type="hidden" name="uid" value="<?php echo $row['uid']?>">

      <button name="delete" class="delete"><i class="fa-solid fa-trash"></i></button>
      </div>
      <div class="giohang-gia">
        <b><p><?php echo $row['price']?></p></b>
      </div>
     
    </div><hr>
    </div>
    <input type="hidden" name="idgiohang" value="<?php echo $row['masp']?>">
      <input type="hidden" name="uid" value="<?php echo $row['uid']?>">
      <input type="hidden" name="namesp" value="<?php echo $row['brand']?>">
      <input type="hidden" name="price" value="<?php echo $row['price']?>">
      <input type="hidden" name="quantity" value="<?php echo $row['quantity']?>">
      <input type="hidden" name="image" value="<?php echo $row['image']?>">

    
<?php
   }

   
?>



  
</form> 

 <div class="form">
        <form action="index.php?page=page/hang/giohang.php" method="post">
        <?php

$data=getCart($uid,$conn);
   for($i=0;$i<count($data);$i++){
         $sum += $data[$i]['quantity']*$data[$i]['price'];
   }
          ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Full Name</label>
    <input type="text" class="form-control" placeholder="Bạn Nhập họ và tên..." name="name">
    <div id="emailHelp" class="form-text">Nhập thông tin</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Số Điện Thoại</label>
    <input type="phone" class="form-control" placeholder="Số Điện thoại..." name="phone">
  </div>
  <div class="mb-3 form-check">
    <label class="form-label">Address</label>
    <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address">
  </div>
  <p>Tổng tiền: <?php echo number_format($sum,0,",",".") ?> đ</p>
    <input type="hidden" name="total" value="<?php echo $sum ?>">
  
  

<button type="submit" class="btn btn-primary" name="order">Submit</button>

</form>
</div>




<?php
       
    if(isset($_POST['delete'])){
        $id = $_POST['idgiohang'];
        $uid = $_COOKIE['uid'];
       // $delete="delete from giohang where id_giohang=$id and uid=$uid";
        //mysqli_query($conn,$delete);
        delete($id,$conn);
        echo '<meta http-equiv="refresh" content="0">';
        
       
      

    }

    if(isset($_POST['order'])){
      $data=Order($_POST,$conn);
      }}
      else{
        
        echo "<h1>Không có san Pham</h1>";
      }
  

  

?>






