<?php
require_once "../conn.php";?>
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
//receiving inputs add_products.html
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$total_stock = $_POST['total_stock'];


    //exist checks
//product
$query = "select product_id from products where product_name='$product_name'";
$result = mysqli_query($conn, $query) or die ("Unsuccessfull Query");
$row = mysqli_fetch_array($result);

$db_usr_name = $row['product_id'];

if($db_usr_name != null){
    echo '<script>swal("Product Already Exists, Try Something Different", {
        button: false,
        icon: "error",
    });;</script>';

    header("refresh:4; url=../add_products.php");


}
else{


//inserting inf o into the products table
$stmt = $conn->prepare("insert into products (`product_name`,`product_price`,`total_stock`) 
VALUES (?, ?, ?)");
$stmt->bind_param("sss", $product_name, $product_price, $total_stock);
$stmt->execute();

//alerts
if($stmt){
    echo '<script>swal("Product Added", {
        button: false,
        icon: "success",
       });;</script>';

 }

else{
    echo '<script>swal("Something went wrong", {
        button: false,
        icon: "error",
       });;</script>';

  }
header("refresh:3; url=../add_products.php");


}
