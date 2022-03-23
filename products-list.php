<?php
require('app/Customer.php');
require('app/Product.php');
require('app/FileUtility.php');

$products_data = FileUtility::openCSV('products.csv');

$products = Product::convertArrayToProducts($products_data);

$customer = new Customer('Stephanie Basilio', 'basilio.stephanie@auf.edu.ph');
?>
<html>
<head>
    <title>My Cart</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif+Display">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg fixed-top navbar-pink bg-pink">
    <div class="container-fluid justify-content-center justify-content-md-between">
      <div class="d-flex my-2 my-sm-0">
        <a class="navbar-brand me-2 mb-1 d-flex justify-content-center" href="#">
          <img src="sm.png" height="120" alt="" loading="lazy" />
        </a>

</div>
</nav>
<div id="products_header">
<img id="products_img" src="ningning.jpg" class="img-fluid" alt="..." width="100%">
<div class="centered"><h1>Welcome <?php echo $customer->getName() ?>!</h1></div>
</div>

<style>
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.centered h1 {
    font-size:  80px;
    position: right;
    color: white;
}

#products_img {
   opacity: 0.5;
}

.card {
    padding-top: 10px;
    background: #ffc0cb;
    margin-top: 20px;
    margin-left: 20px;
    width:  350px;
}

#products_header {
  position: relative;
  text-align: center;
    background: linear-gradient(200deg, rgba(100,37,5,1) 0%, rgba(47,27,14,1) 35%);
    overflow: hidden;
}

#title_card {
    font-size: 30px;
}

#button_style {
    background:  #ffffff;
    border-color: #ffffff;
    color: #ffc0cb;
    margin-top: 20px;
    margin-left: 50%;
    object-position: center;

}

#quantity_style {
    width: 50px;
}
</style>

<form action="app/ShoppingCart.php" method="POST">
<div class="row row-cols-1 row-cols-md-4 g-6">
<?php foreach ($products as $product): ?>
    <div class="card">
  <img src="<?php echo $product->getImage(); ?>" class="card-img-top" alt="...">
<div class="card-body">
        <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>" />
        <h5 class="card-title" id="title_card"><?php echo $product->getName(); ?></h5>
    <p class="card-text">
        <?php echo $product->getDescription(); ?><br/>
        <span style="color: white; font-weight: bold;">PHP <?php echo $product->getPrice(); ?></span>
        Qty <input id="quantity_style" type="number" name="quantity" class="quantity" value="" />
        <button class="btn btn-primary" id ="button_style" type="submit"> 
            ADD TO CART
        </button>
    </p>
      </div>
    </div>
<?php endforeach; ?>
  </div>
  </div>
</form>
</body>
</html>