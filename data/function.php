<?php

function delete($id, $conn)
{
    $sql = "DELETE FROM giohang where id_giohang=$id";
    mysqli_query($conn, $sql);
}
function search($idtk, $conn)
{
    $sql = "SELECT * FROM cars where brand like '%$idtk%'";
    $r = mysqli_query($conn, $sql);
    $data = array();
    if ($r) {
        if (mysqli_num_rows($r)) {
            while ($row = mysqli_fetch_array($r)) {
                $data[] = $row;
            }
        }
        return $data;
    }
}
function getProductDetail($id, $conn)
{
    $sql = "SELECT * FROM cars WHERE id=$id";
    $r = mysqli_query($conn, $sql);
    $data = array();
    if ($r) {
        if (mysqli_num_rows($r) > 0) {
            while ($row = mysqli_fetch_array($r)) {

                $data[] = $row;
            }
        }
        return $data;
    }
}

function brands($conn){
    $sql="SELECT * FROM brands";
    $r=mysqli_query($conn, $sql);
    $data=array();
   if($r){
        if(mysqli_num_rows($r)>0){
            while($row=mysqli_fetch_array($r)){
                $data []=$row;
            }
        }
        return $data;
    }

}

function getProduct($id, $conn)
{

    $sql_menu = "SELECT * FROM cars where brands_id=$id";
    $s = mysqli_query($conn, $sql_menu);
    $data=array();
    if ($s) {
        if (mysqli_num_rows($s) > 0) {
            while ($row = mysqli_fetch_array($s)) {
                $data[]=$row;
            }
        }
    }
    return $data;
}


function addCart($post,$conn)
{
    
        $id = $post['idsanpham'];
        $quantity = $post['soluong'];
        $uid = $_COOKIE['uid'];
        
        $sql = "Select *from giohang where giohang.uid='$uid' and giohang.masp='$id'";
        $r = mysqli_query($conn, $sql);
        if (mysqli_num_rows($r) <=0 ) {
           
            $sql = "Insert into giohang (uid,masp,quantity) values ('$uid','$id','$quantity')";
            $conn->query($sql);
            header("location:/new/index.php?page=page/hang/giohang.php");
            
        } else {
        while ($re=mysqli_fetch_array($r)) {
                
            $sl=$re['quantity']+$quantity;
            
            $sql = "Update giohang set quantity=$sl where giohang.uid='$uid' and giohang.masp='$id'";
           mysqli_query($conn, $sql);
            header("location:/new/index.php?page=page/hang/giohang.php");
        }
        }



}
    

function getCart($uid,$conn){
    $sql="Select * from giohang inner join cars on giohang.masp like cars.id where giohang.uid = '$uid' order by giohang.id_giohang DESC";
    $r=mysqli_query($conn,$sql);
    $data=array();
    if(mysqli_num_rows($r)>0){
        while($row=mysqli_fetch_array($r)){
            $data[]=$row;
        }
        return $data;

}

}

function Toral($uid,$conn){
    
    $sql="select sum(price*quantity) as total from giohang inner join cars giohang.masp like cars.brands_id where uid = '$uid' ";
    $result=mysqli_query($conn,$sql);
    $data=array();
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($r = mysqli_fetch_array($result)) {
                $data[]=$r;
            }
            return $data;
        }
    }
}

function Order($post,$conn){
    
    $uid=$_COOKIE['uid'];
    $nameuser=$post['name'];
    $phone=$post['phone'];
    $address=$post['address'];
    $total=$post['total'];
    $idorder=rand(0,500000);

    $order="Insert into order_us (name,phone,total,address,id_order,uid) values('$nameuser','$phone','$total','$address','$idorder','$uid')";
      

    if (mysqli_query($conn, $order)) {
        $sql="select * from giohang inner join cars on giohang.masp like cars.id where uid=$uid";
        $response = mysqli_query($conn, $sql);
        
        if ($response == true) {
            if (mysqli_num_rows($response) > 0) {
                while ($a = mysqli_fetch_array($response)) {
                
                    $masp=$a['idgiohang'];
                                $namesp=$a['namesp'];
                                $image=$a['image'];
                                $quantity=$a['quantity'];
                                $price=$a['price'];
                                
                                
                                createOders($masp,$namesp,$image,$quantity,$price,$idorder,$conn);
                }
            }
        }
    }
}

function createOders($idgiohang,$name,$image,$quantity,$price,$idorder,$conn){
    $chitietdon="insert into `orders` (`masp`,`namesp`,`image`,`quantity`,`price`,`id_oder`) values('$idgiohang','$name','$image','$quantity','$price','$idorder')";
    if(mysqli_query($conn,$chitietdon)){
        $uid = $_COOKIE['uid'];
        $request = "DELETE FROM giohang WHERE uid = $uid";
        if(mysqli_query($conn,$request)){
            echo '<script type="text/javascript">
            Swal.fire({
                title: "Đặt hàng thành công!",
                icon: "success",
                timer: 2000,
                timerProgressBar: true,
                showConfirmButton: false,
                
            });
            </script>';
            echo '<meta http-equiv="refresh" content="0;url=index.php?quanly=donhang">';
        }
    }
    
    



}


function getOrder($conn){
    $uid=$_COOKIE['uid'];

    $sql="SELECT * FROM orders inner join order_us on orders.id_oder like order_us.id_order where order_us.uid = '$uid'";
}
   
   







