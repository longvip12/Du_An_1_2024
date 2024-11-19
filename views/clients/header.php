<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cosmetics - The Best Way For Healthy Skin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div
      class="container-fluid fixed-top px-0 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
          <small
            ><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York,
            USA</small
          >
          <small class="ms-4"
            ><i class="fa fa-envelope me-2"></i>info@example.com</small
          >
        </div>
        <div class="col-lg-6 px-5 text-end">
          <small>Follow us:</small>
          <a class="text-body ms-3" href=""
            ><i class="fab fa-facebook-f"></i
          ></a>
          <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
          <a class="text-body ms-3" href=""
            ><i class="fab fa-linkedin-in"></i
          ></a>
          <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
        </div>
      </div>

      <nav
        class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn"
        data-wow-delay="0.1s"
      >
        <a href="<?= ROOT_URL ?>" class="navbar-brand ms-4 ms-lg-0">
          <h1 class="fw-bold text-primary m-0">
            <span class="text-secondary">
            <img class="logo" src="img/logo.webp" alt="Image" />

            </span>
          </h1>
        </a>
        <button
          type="button"
          class="navbar-toggler me-4"
          data-bs-toggle="collapse"
          data-bs-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav top ms-auto p-lg-0">
            <!-- <a href="index.html" class="nav-item nav-link active">Home</a>
            <a href="about.html" class="nav-item nav-link">About Us</a>
            
            <div class="nav-item dropdown">
              <a
                href="#"
                class="nav-link dropdown-toggle"
                data-bs-toggle="dropdown"
                >Products</a
              >
                <div class="dropdown-menu">
                  <a href="blog.html" class="dropdown-item">Chăm sóc da</a> 
                  <a href="feature.html" class="dropdown-item">Make Up</a>
                  <a href="testimonial.html" class="dropdown-item">Ưu đãi đặc biệt</a>
              </div>
            </div>
           
            <a href="contact.html" class="nav-item nav-link">Contact Us</a>
             -->
             <div class="menu" id="navar">
              <ul>
                <li>
                  <a href="index.html">Home</a>
                </li>
                <li class="drop-two">
                  <a href="#">Products<span>&#11167</span></a>
                  <div class="menu-two">
                   
                    <?php foreach ($categories as $cate) : ?>
                    <ul>
                     
                      <li><a href="<?= ROOT_URL . '?ctl=category&id=' . $cate['id'] ?>">
                        <?= $cate['cate_name']?>
                      </li></a>
                     
                    </ul> 
                    <?php endforeach ?>
                    
                  </div>
                </li>
                <li class="drop-two">
                    <a href="#">About us <span>&#11167</span></a>
                    <div class="menu-two">
                      <ul>
                        <li><a href="contact.html">Liên hệ với chúng tôi</a> </li>
                        <li><a href="about.html">Về Cosmetics</a></li>
                        <li><a href="lie.html">Đổi trả sản phẩm</a></li>
                      </ul>
                    </div>
                  </li>
              </ul>
            </div>
          </div>
          <div class="d-none d-lg-flex ms-2">
            <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="keyword">
                        <button class="btn btn-outline-success" type="button" id="search">Search</button>
            </form>
                      <?php if(isset($_SESSION["user_name"])) { ?>
                  
                    
                    <a href="#"><?= $_SESSION["user_name"] ?><span>&#11167</span></a>
                    <a href="<?= ROOT_URL . '?ctl=login' ?>"> Logout </a>
                    
                  
                  <?php } else{ ?>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="<?= ROOT_URL . '?ctl=login' ?>">
                        <small class="fa fa-user text-body"></small>
                    </a>
                      <?php } ?>
            
            <a class="btn-sm-square bg-white rounded-circle ms-3" href="shopping-cart.html">
              <small class="fa fa-shopping-bag text-body"></small>
            </a>
          </div>
        </div>
      </nav>
    </div>
    <!-- Navbar End -->
    <!-- header -->