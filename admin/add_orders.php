<!--This page is for adding new orders-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Admin can add orders here</h3>
    <form action="../handlers/orders_handler.php" method="post">
        <input type="text" placeholder="user_name" name="user_name">
        <input type="text" placeholder="product_name" name="product_name">
        <input type="text" placeholder="quantity" name="quantity">
         <select name="order_state">
            <option selected disabled> Order State</option>
            <option>Paid</option>
            <option>Loaned</option>
        </select>
        <br>

        <input type="submit" value="Add Order">
    </form>

    <?php 
    //This php is suppose to print all rows in the orders table ... it is updated anytime a new order is added
    require_once "../conn.php";

    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql);

     echo "Ord_id_____User Name_______Ordered Item ______Quantity______Total____ Order State";


    if ($result->num_rows > 0){
        while ($row = $result-> fetch_assoc()){
            $user_id = $row['user_id'];
            $product_id = $row['product_id'];

            $query = "select full_name from users where id = '$user_id'";
            $result_2 = mysqli_query($conn, $query) or die ("Unsuccessful Query");
            $nd_row = mysqli_fetch_array($result_2);

            $query = "select * from products where product_id = '$product_id'";
            $result_3 = mysqli_query($conn, $query) or die ("Unsuccessful Query");
            $ird_row = mysqli_fetch_array($result_3);

            $order_id = $row['order_id'];
            $full_name = $nd_row['full_name'];
            $product_name = $ird_row['product_name'];
            $product_price = $ird_row['product_price'];
            $quantity = $row['quantity'];
            $total = $row['total'];
            $order_state = $row['order_state'];
            $currency_unit = "GHC";



            $order_state = $row['order_state'];



             echo "<br>";
             echo "<br>";


            //I did not style it, You can style it anyhow you want, just give classes the span and manipulate it anyhow
            echo" 
                    
            <span class='three-col-grid'>

            <span >   {$order_id}              </span> 
            <span style='margin-left: 80px;'>   {$full_name}              </span> 
            
            <span style='margin-left: 90px;'>   {$product_name}        </span>
            
            <span style='margin-left: 120px;'>   {$quantity}    </span>

            <span style='margin-left: 100px;'>   {$total}{$currency_unit}    </span>

            <span style='margin-left: 80px;'>   {$order_state}    </span>

            </span>
            <br>\n";
          }
    }

    else{
        echo "no results";
    }

    
    $conn->close();

?>
    
</body>
</html>