<?php require_once "conn.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="css/edit.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
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

    <div class="container">
        <div class="top_bar cen">
            <h4 style="color: white;">Products</h4>
            <div class="icon">.
            </div>
        </div>
        <form class="cen">
            <input class="main" type="text" placeholder="search for a product">
            <input type="submit" value="Search">
        </form>

        <div class="products">
            <div class="banner">
                <div class="b_item">
                    <h4>Name</h4>
                </div>
                <div class="b_item">
                    <h4>Price</h4>
                </div>
                <div class="b_item">
                    <h4>Quantity Remaining</h4>
                </div>
            </div>

            <div class="product_loop">
                
                <?php

                $query = "select * from products";
                $result = $conn->query($query);


                if ($result->num_rows > 0){
                    while ($row = $result-> fetch_assoc()){
                        $id    = $row['product_id'];
                        $product_name  = $row['product_name'];
                        $price = $row['product_price'];
                        $quantity = $row['total_stock'];

                        
                        

                        echo "

 
                        

                        <div class='loop_item'>
                        <a class='link'href='edit.php?id={$id}'>Edit</a>

                            <div class='name'>
                                <h4>$product_name</h4>
                            </div>
                            <div class='Price'>
                                <h4>$price</h4>
                            </div>
                            <div class='name'>
                                 <h4>$quantity</h4>
                            </div>
                             
                        </div>

                        
                        ";

                        

                    }
                }

            

                ?>

            </div>
 
           
        </div>

 
 
        
      
    </div>
    <script>
       
    </script>
    
</body>
</html>