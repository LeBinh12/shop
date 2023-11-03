<?php
    session_start();
    if(isset($_POST['giohang'])){
        $id=$_POST['id'];
        $price=$_POST['soluong'];
        $uid=$_COOKIE['uid'];


        $sql="Select *from giohang inner join cars on giohang.uid like cars.id  where giohang.uid='$uid' and giohang.masp='$id'";
        $r=mysqli_query($conn,$sql);
        if(mysqli_num_rows($r)>0){
          if($price==$price){

          
            $row=mysqli_fetch_array($r);
           
            $sql="Update giohang set quantity=quantity+$price where giohang.uid='$uid' and giohang.masp='$id'";
           mysqli_query($conn,$sql);
          }
        
        else{
            $sql="Insert into giohang (uid,masp,quantity) values ('$uid','$id','$price')";
            $conn->query($sql);
        }
    }
   
?>


                <table class="table">
  <thead>
  <form action="" method="post">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">MaSP</th>
      <th scope="col">San Pham</th>
      <th scope="col">So Luong</th>
      <th scope="col">Xoa</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $sql="Select * from giohang inner join cars on giohang.masp like cars.id where giohang.uid = '$uid'";
    $r=mysqli_query($conn,$sql);
    if(mysqli_num_rows($r)>0){
        while($row=mysqli_fetch_array($r)){
            ?>
           
    <tr>
      <th scope="row"><?php echo $row['id_giohang'] ?></th>
      <td><?php echo $row['uid']?></td>
      <td><?php echo $row['brand'] ?>
            <img src="image/<?php echo $row['image'] ?>" width="150px" alt="">
           
    </td>
    <td><?php echo $row['quantity'] ?></td>
    
      <td>
        <input type="hidden" name="idgiohang" value="<?php echo $row['id_giohang']?>">
        <input type="hidden" name="uid" value="<?php echo $row['uid']?>">
        <input type="hidden" name="masp" value="<?php echo $row['id']?>">
      <input type="submit" class="btn btn-success" value="Dat Hang" name="dathang"></input>
        <button  class="btn btn-danger" name="delete">Xoa</button></td>
   </form>
            <?php
        }

    }
}
?>



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





