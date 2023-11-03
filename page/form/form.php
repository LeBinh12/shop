



<?php
    if(isset($_POST["dathang"])){
        $id=$_POST["id"];
            
                      
               

       ?>   
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
  <input type="hidden" name="uid" value="<?php echo"$uid"?>">
  <input type="hidden" name="id" value="<?php echo "$id"?>">
  <button type="submit" class="btn btn-primary" name="order">Submit</button>

</form>
      
        <?php
                }
        
        
        
    
                    
    
                
            
            
    
        
    ?>
    <h3>Đặt Hàng</h3>
       








