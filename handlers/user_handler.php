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
if(isset($_POST['installment'])){
    $user_id = $_POST['user_id'];
    $amount = $_POST['amount'];

    $query = "select debit from users where id = '$user_id'";
    $result = mysqli_query($conn, $query) or die ("Unsuccessful Query");
    $row = mysqli_fetch_array($result);
    $debit = $row['debit'];

    $debit = $debit - $amount;
    $query = "update users set debit = '$debit' where id = '$user_id'";
    $execute = mysqli_query($conn, $query) or die ("Unsuccessfull Query");

    echo "<script>alert('user debit updated');</script>";
    header("refresh:1; url=../admin/loaned_item_payment.php");

}
else{


    $full_name = $_POST['full_name'];
    $debit = $_POST['debit'];


    //exist checks
    //user
    $query = "select id from users where full_name='$full_name'";
    $result = mysqli_query($conn, $query) or die ("Unsuccessfull Query");
    $row = mysqli_fetch_array($result);

    $db_usr_name = $row['id'];

    if($db_usr_name != null){
        echo '<script>swal("Username Already Exists, Try Something Different", {
            button: false,
            icon: "error",
        });;</script>';

        header("refresh:4; url=../add_users.php");


    }
    else{




    $stmt = $conn->prepare("insert into users (`full_name`,`debit`) 
    VALUES (?, ?)");

    $stmt->bind_param("ss", $full_name, $debit);
    $stmt->execute();

    if($stmt){
        echo '<script>swal("New User Added", {
            button: false,
            icon: "success",
           });;</script>';
    
           header("refresh:4; url=../add_users.php");

     }
    else{
        echo '<script>swal("Something Went Wrong", {
            button: false,
            icon: "error",
           });;</script>';
    
           header("refresh:4; url=../add_users.php");    }
 
}


}


