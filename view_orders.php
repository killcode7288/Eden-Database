<!--This page is for adding new orders-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href='css/general.css'>
</head>
<body >
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Eden Shopping Center</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="add_orders.php">ADD ORDER</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="add_products.php">ADD PRODUCT</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="add_users.php">ADD USER</a>
                    </li>    
                    <li class="nav-item">
                    <a class="nav-link" href="loaned_item_payment.php">Clear User's Loaned Product</a>
                    </li>    
                    <li class="nav-item">
                    <a class="nav-link" href="view_orders.php">VIEW ORDERS</a>
                    </li>    
                    <li class="nav-item">
                    <a class="nav-link" href="view_products.php">VIEW PRODUCTS</a>
                    </li>    
                    <li class="nav-item">
                    <a class="nav-link" href="view_users.php">VIEW USERS</a>
                    </li>    
                </ul>
            </div>
        </div>
    </nav>
    <div class="cen">
        <div class="containers">
            

    

            <?php 
                //This php is suppose to print all rows in the orders table ... it is updated anytime a new order is added
                require_once "conn.php";

                $sql = "SELECT * FROM orders";
                $result = $conn->query($sql);
                
                echo '
                <div class="labels">
                    <div class="label_item">
                        ORDER ID
                    </div>
                    <div class="label_item">
                        User Name
                    </div>
                    <div class="label_item">
                        Product
                    </div>
                    <div class="label_item">
                        Quantity
                    </div>
                    <div class="label_item">
                        Total
                    </div>
                    <div class="label_item">
                        Order State
                    </div>
                
                </div>
                ';
                


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

                        <span >  {$order_id}              </span> 
                        <span>   {$full_name}              </span> 
                        <span>   {$product_name}           </span>
                        <span>   {$quantity}               </span>
                        <span>   {$total}{$currency_unit}  </span>
                        <span>   {$order_state}            </span>

                        </span>
                        <br>\n";
                    }
                }

                else{
                    echo "no results";
                }

                
                $conn->close();

            ?>
        </div>
    </div>

    
</body>
</html>