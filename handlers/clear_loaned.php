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

//getting id of the loaned item
$ID = mysqli_real_escape_string($conn, $_GET['ID']);



//deducting debit from the users table
$query = "select price, user_id from loaned where id = '$ID'";
$execute = mysqli_query($conn, $query) or die ("unsuccessfull query");
$row = mysqli_fetch_array($execute);

$user_id = $row['user_id'];
$total = $row['price'];

//getting user information
$query = "select * from users where id = '$user_id'";
$execute = mysqli_query($conn, $query) or die ("unsuccessfull query");
$row = mysqli_fetch_array($execute);

$current_debit = $row['debit'];
$new_debit = $current_debit - $total;
 
$query = "update users set debit = '$new_debit' where id = '$user_id'";
$execute = mysqli_query($conn, $query) or die ("unsuccessfull query");
 
//deleting item paid for from the loaned table
$query = "delete from loaned where id = '$ID'";
$execute = mysqli_query($conn, $query) or die ("unsuccessfull query");


if($query){
    echo '<script>swal("Loaned Item Cleared", {
        button: false,
        icon: "success",
       });;</script>';

}

header("refresh:4; url=../loaned_item_payment.php");


 












