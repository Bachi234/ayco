<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/home_shop.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/logo3.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <title>AYCO PRE-BUILT PCS</title>
</head>
<body>
  
<!--Navbar Start-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="home_shop.php"><img src="img/nav_banner.png" class="img-logo"/></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home_shop.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="product_shop.php">PC Build</a></li>
            <li><a class="dropdown-item" href="product_shop_2.php">Premium Build</a></li>
            <li><a class="dropdown-item" href="product_shop_3.php">Gaming Build</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary me-4" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        <a href="user_account.php" class="me-3 fa-2x"><i class="fa-solid fa-user"></i></a>
        
        <a href="#!" class="me-3 fa-2x"><i class="fa-sharp fa-solid fa-gear"></i></a>
      </form>   
      

      <i class="fa-regular fa-user"></i>
    </div>
  </div>
</nav>
<!--Navbar End-->

<section style="background-image: linear-gradient(to bottom right, darkblue, lightblue);">
  <div class="container py-5">
  <h1 class="mt-4 mb-5" style="font-weight:900; color: white;"><strong>Premium Build Collection</strong></h1>

    <!--Single Product Start-->
    <div class="row">
      <div class="col-lg-4 col-md-12 mb-4">
        <div class="card">
          <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
            data-mdb-ripple-color="light">
            <img src="img/lian_li.png"
              class="w-100" style="height: 250px;"/>
            <a href="#!">
              <div class="mask">
                <div class="d-flex justify-content-start align-items-end h-100">
                  <h5><span class="badge bg-primary ms-2">New</span></h5>
                </div>
              </div>
              <div class="hover-overlay">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </div>
            </a>
          </div>
          <div class="card-body" style="background-color: rgba(175,155,155,.2);">
            <a href="" class="text-reset">
              <h5 class="card-title mb-3">Lian Li Premium PC</h5>
            </a>
            <a href="" class="text-reset">
              <p>PC BUILDS</p>
            </a>
            <h6 class="mb-3">$61.99</h6>
            <button  class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-cart-shopping"></i></button>
            <button  class="btn btn-outline-primary" type="submit">Buy Now</button>
          </div>
        </div>
      </div>
      <!--Single Product End-->

      <!--Single Product Start-->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
            data-mdb-ripple-color="light">
            <img src="img/noctua.png"
              class="w-100" style="height: 250px;"/>
            <a href="#!">
              <div class="mask">
                <div class="d-flex justify-content-start align-items-end h-100">
                  <h5><span class="badge bg-success ms-2">Eco</span></h5>
                </div>
              </div>
              <div class="hover-overlay">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </div>
            </a>
          </div>
          <div class="card-body " style="background-color: rgba(175,155,155,.2);">
            <a href="" class="text-reset" >
              <h5 class="card-title mb-3" style="font-weight:800;">Noctua Premium PC BUILD</h5>
            </a>
            <a href="" class="text-reset">
              <p>CPU</p>
            </a>
            <h6 class="mb-3">$61.99</h6>
            <button  class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-cart-shopping"></i></button>
            <button  class="btn btn-outline-primary" type="submit">Buy Now</button>
          </div>
        </div>
      </div>
      <!--Single Product End-->

      <!--Single Product Start-->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card">
          <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
            <img src="img/cooler_master.png"
              class="w-100" style="height: 250px;"/>
            <a href="#!">
              <div class="mask">
                <div class="d-flex justify-content-start align-items-end h-100">
                  <h5><span class="badge bg-danger ms-2">-10%</span></h5>
                </div>
              </div>
              <div class="hover-overlay">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </div>
            </a>
          </div>
          <div class="card-body" style="background-color: rgba(175,155,155,.2);">
            <a href="" class="text-reset">
              <h5 class="card-title mb-3">CoolerMaster Premium PC BUILD</h5>
            </a>
            <a href="" class="text-reset">
              <p>CPU</p>
            </a>
            <h6 class="mb-3">
              <s>$61.99</s><strong class="ms-2 text-danger">$50.99</strong>
            </h6>
            <button  class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-cart-shopping"></i></button>
            <button  class="btn btn-outline-primary" type="submit">Buy Now</button>
          </div>
        </div>
      </div>
    </div>
    <!--Single Product End-->

        </div>
      </div>
    </div>
  </div>
</section>

        <!-- Footer -->
        <footer class="text-center text-lg-start bg-dark text-white">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
 
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            
          </h6>
          <p>
            Find and Build your dream PC. @Ecommies your PC is within your reach.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="product_shop.php" class="text-reset">Build PC</a>
          </p>
          <p>
            <a href="product_shop_2.php" class="text-reset">Premium PC</a>
          </p>
          <p>
            <a href="product_shop_3.php" class="text-reset">Gaming PC</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help Desk</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3 text-secondary"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3 text-secondary"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3 text-secondary"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3 text-secondary"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>

      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
    © 2024 Copyright:
    <a class="text-reset fw-bold" href="index.php">For Educational Purpose</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>