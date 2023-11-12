  
<?php
    $uid = $_COOKIE['uid'];
?>

<div class="giohang">
                <table class="table">
  <thead>
  <form action="" method="post">
    <tr>
      
      <th scope="col">San Pham</th>
      <th scope="col">So Luong</th>
      <th scope="col">Xoa</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $data=getCart($uid,$conn);
    for($i=0;$i<count($data);$i++){
            ?>
           
    <tr>
     
      <td><?php echo $data[$i]['brand'] ?>
            <img src="image/<?php echo $data[$i]['image'] ?>" width="150px" alt="">
           
    </td>
    <td><?php echo $data[$i]['quantity'] ?></td>
    
      <td>
        <input type="hidden" name="idgiohang" value="<?php echo $data[$i]['id_giohang']?>">
        <input type="hidden" name="uid" value="<?php echo $data[$i]['uid']?>">
        <input type="hidden" name="masp" value="<?php echo $data[$i]['masp']?>">
     
        <button name="delete"><i class="fa-solid fa-trash"></i></button>
      </td>
   </form>
            <?php
        }

    

?>



<?php $sql="Select * from giohang inner join cars on giohang.masp like cars.id where giohang.uid = '$uid' and giohang.masp";
    $r=mysqli_query($conn,$sql);
    
          ?>
 <div class="form">
        <form action="index.php?page=page/hang/dathang.php" method="post">
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
  <input type="hidden" name="uid" value="<?php echo $row['uid']?>">
  <input type="hidden" name="masp" value="<?php echo $row['masp']?>">

  <button type="submit" class="btn btn-primary" name="order">Submit</button>

</form>
</div>      
        
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


?>





