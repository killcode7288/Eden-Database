<?php require_once "conn.php";

$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = "select * from products where product_id = '$id'";
$result = mysqli_query($conn, $query) or die ("Unsuccessful Query");
$row = mysqli_fetch_array($result);

$product_name = $row['product_name'];
$product_price = $row['product_price'];
$quantity = $row['total_stock'];
 
 

?>
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
    <div class="containers">
        <div class="top_bar cen">
            <h4>Edit Product Info</h4>
            <div class="icon">.
            </div>
        </div>

        <div class="product_info">
            <form action='handlers/update_product.php?id=<?php echo $id ?>' method='post'>
                <div class="info">
                    <label>
                        Product Name
                    </label>
                    <input type='text' name='product_name' placeholder='<?php echo $product_name ?>'>
                </div>
                <div class="info">
                    <label>
                        Price
                    </label>
                    <input type='text' name='product_price' placeholder='<?php echo "GHC".$product_price ?>'>
                </div>
                <div class="info">
                    <label>
                        Quantity
                    </label>
                    <input type='text' name='total_stock' placeholder='<?php echo $quantity ?>'>
                </div>
             
                <div class="submit">
                    <input type='submit' name="update" value='Update'>

                </div>

                <button name="delete" onclick="location.href='handlers/update_product.php?id='<?php echo $id ?>'">Delete This Product</button>
            </form>

        </div>
       
        
      
    </div>
    <script>
        function test(id){
            document.getElementById("hours").innerHTML = id;
        }
    </script>
    
</body>
</html>