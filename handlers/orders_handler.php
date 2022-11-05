<?php require_once "../conn.php";?>
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


//receiving posts from the orders table
$user_name = $_POST['user_name'];
$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
$order_state = $_POST['order_state'];


//exist checks
//cheking if the product exists
$query = "select product_id from products where product_name='$product_name'";
$result = mysqli_query($conn, $query) or die ("Unsuccessfull Query");
$row = mysqli_fetch_array($result);

$db_pro_name = $row['product_id'];

if($db_pro_name == null){
    echo '<script>swal("Product Does Not Exist", {
        button: false,
        icon: "error",
       });;</script>';

       header("refresh:4; url=../add_orders.php");


}
//exist checks
//checking if the user exists
$query = "select id from users where full_name='$user_name'";
$result = mysqli_query($conn, $query) or die ("Unsuccessfull Query");
$row = mysqli_fetch_array($result);

$db_usr_name = $row['id'];

if($db_usr_name == null){
    echo '<script>swal("User Does Not Exist", {
        button: false,
        icon: "error",
       });;</script>';

       header("refresh:4; url=../add_orders.php");


}


//getting the user who is making the orders information
$query = "select * from users where full_name = '$user_name'";
$result = mysqli_query($conn, $query) or die ("Unsuccessful Query");
$row = mysqli_fetch_array($result);
$user_id = $row['id'];
$current_debit = $row['debit'];



//getting product id, total stock and price based on the inputted product name
$query = "select product_id, product_price, total_stock from products where product_name = '$product_name'";
$result = mysqli_query($conn, $query) or die ("Unsuccessful Query");
$row = mysqli_fetch_array($result);

$product_id = $row['product_id'];
$product_price = $row['product_price'];
$total_stock = $row['total_stock'];

//total store the value of the total amount to be paid per purchased item
$total = $product_price * $quantity;

//subtracting to get the new item stock
$total_stock = $total_stock - $quantity;

//reducing the quantity of the purchased item in the products table
$query = "update products set total_stock = '$total_stock' where product_name = '$product_name'";
$execute = mysqli_query($conn, $query) or die ("unsuccessful query");


 
//updating the orders table with the info above
$stmt = $conn->prepare("insert into orders (`user_id`,`product_id`,`quantity`,`total`,`order_state`) 
VALUES (?, ?, ?, ?, ?)");

$stmt->bind_param("sssss", $user_id, $product_id,$quantity,$total, $order_state);
$stmt->execute();


//if the person loaned the item, the total amount will be added to his/her debit in the users table
if($order_state == 'Loaned'){
    //add total amount to the current debit
    $new_debit = $current_debit + $total;

    $query = "update users set debit = '$new_debit' where id = '$user_id'";
    $execute = mysqli_query($conn, $query) or die ("Unsuccessfull Query");

    //updating loaned table
    $query = "insert into loaned (`user_id`,`product_id`,`quantity`, `price`) values ($user_id, $product_id,$quantity, $total)";
    $execute = mysqli_query($conn, $query) or die ("unsuccessful Query");
    echo '<script>swal("Loaned Order Added", {
        button: false,
        icon: "success",
       });;</script>';

}

//alerts
else if($order_state == 'Paid'){
    if($stmt){
         echo '<script>swal("Paid Order Added", {
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
    
   
}

if($total_stock <= 10){
    

    echo '<script>alert("'.$product_name.' is about to go out of stock, please restock")</script>';
}

header("refresh:4; url=../add_orders.php");
