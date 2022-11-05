<?php
require_once "../conn.php";?>
$id = mysqli_real_escape_string($conn, $_GET['id']);
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

 </head>
 <body>
    
 </body>
 </html>
<?php
if (isset($_POST['update'])){

    $product_name   = $_POST['product_name'];
    $product_price  = $_POST['product_price'];
    $total_stock    = $_POST['total_stock'];
  

    if($product_name!=null){
        $query = "update products set product_name = '$product_name' where product_id = '$id'";
        $execute = mysqli_query($conn, $query) or die ("Unsuccessful Query");
        if($query){
            echo "great";
        }
        else{
            echo "sloww";
        }
    }


    if($product_price !=null){
        $query = "update products set product_price  = '$product_price ' where product_id = '$id'";
        $execute = mysqli_query($conn, $query) or die ("Unsuccessful Query");
        if($query){
            echo "great 1";
        }
        else{
            echo "sloww";
        }
    }

    if($total_stock!=null){
        $query = "update products set total_stock = '$total_stock' where product_id = '$id'";
        $execute = mysqli_query($conn, $query) or die ("Unsuccessful Query");
        if($query){
            echo "great 2";
        }
        else{
            echo "sloww";
        }
    }
    echo '<script>swal("Product Information Updated", {
        button: false,
        icon: "success",
    });;</script>';

    header("refresh: 4, url=../edit.php?id=$id");


}

if (isset($_POST['delete'])){
    $query = "delete from products where product_id = '$id'";
    $execute = mysqli_query($conn, $query) or die ("unsuccssfull Query");

    if($exeute){
        echo '<script>swal("Product Deleted", {
            button: false,
            icon: "success",
           });;</script>';
    
           header("refresh: 4, url=../edit.php?id=$id");
    

    }
}

