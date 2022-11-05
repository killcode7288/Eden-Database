<?php require_once "../conn.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/edit.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</head>
<body>
<div class="banner">
                <div class="b_item">
                    <h4>Product Name</h4>
                </div>
                <div class="b_item">
                    <h4>Quantity Purchased</h4>
                </div>
                <div class="b_item">
                    <h4>Total</h4>
                </div>
            </div>

    
    
</body>
</html>
<?php
 
$username = $_POST['username'];

//selecting
$query = "select * from users where full_name = '$username'";
$execute = mysqli_query($conn, $query) or die ("Unsuccessful Query");
$row = mysqli_fetch_array($execute);
 $user_id = $row['id'];

 if($user_id == null){
    echo '<script>swal("User Does Not Exist", {
        button: false,
        icon: "error",
       });;</script>';

       header("refresh:4; url=../loaned_item_payment.php");

 }

if($query){
    $query = "select * from loaned where user_id = '$user_id'";
 
    $result = $conn->query($query);

    if ($result->num_rows > 0){
        while ($row = $result-> fetch_assoc()){
            $loaned_id = $row['id'];
            $product_id = $row['product_id'];
            $quantity = $row['quantity'];
            $total = $row['price'];
            $clear_message = "clear";

            //getting the loaned product name
            $query = "select product_name from products where product_id = '$product_id'";
            $result_2 = mysqli_query($conn, $query) or die ("Unsuccessful Query");
            $nd_row = mysqli_fetch_array($result_2);

            $product_name = $nd_row['product_name'];


            


            echo" 
            

            <div class='loop_item'>
                 <a class='link'href='clear_loaned.php?ID={$row['id']}'>Clear</a>

                <div class='name'>
                    <h4>$product_name</h4>
                </div>
                <div class='Price'>
                    <h4>$quantity</h4>
                </div>
                <div class='name'>
                     <h4>$total</h4>
                </div>
                 
            </div>

            
            
            ";
        }

           
          
    }
    else{
        echo '<script>swal("User Has No Unpaid Debts", {
            button: false,
            icon: "error",
           });;</script>';
    
           header("refresh:4; url=../loaned_item_payment.php");
    
     }
}
  
 
 

else{
        echo "no results";
}
?>
 
            

 
            </div>
 
           
        </div>


 


 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>