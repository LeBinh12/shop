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
    echo $post['idsanpham'];
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