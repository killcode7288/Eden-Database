<!--This page is when a user wants to pay off an item he loaned-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <h3 >Enter the user who wants to pay his loan</h3>


     <form action="handlers/loaned.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="submit" name="submit">
    </form>


 

    
</body>
</html>