<header class="pt-2">
    <div class="container-fluid d-flex flex-wrap justify-content-center pt-2">
        <a href="Index.php" class="mb-md-0 mb-3">
            <img src="assets/images/Logo/hereu_watch_black.jpg" class="logo-img" alt="">
        </a>
        <form action="/search" method="post" class="col-12 col-lg-6 me-lg-5 ms-lg-5 mb-3 pt-lg-4 mb-lg-0 justify-content-center">
            <div class="p-1 bg-light rounded-pill shadow-sm mb-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button id="" type="submit" class="btn btn-link text-warning"><i class="fa fa-search"></i></button>
                    </div>
                    <input type="search" name="search" placeholder="What're you searching for?" aria-describedby="" class="form-control border-0 bg-light rounded-pill">
                </div>
            </div>
        </form>
        <ul class="nav header-list text-end pt-lg-4">
            <li class="nav-item"><a href="/cart" class="text-decoration-none nav-link"><i class="fab fa-shopify fs-4 "></i></a>
            </li>
            <?php
            if (auth()) {
                echo '
                    <li class="nav-item"><a href="/login" class="text-decoration-none nav-link">' . auth()->username . '</a>
                        </li>
                        <li class="nav-item"><a href="/logout" class="text-decoration-none nav-link">Log out</a>
                        </li>
                ';
            } else {
                echo '<li class="nav-item"><a href="/login" class="text-decoration-none nav-link ">Sign in</a>
                        </li>
                        <li class="nav-item"><a href="/register" class="text-decoration-none nav-link">Register</a>
                        </li>';
            }
            ?>
        </ul>
    </div>
</header>
<!--Navbar-->
<nav class="main-menu navbar navbar-expand-lg navbar-light position-sticky" style="top:0; z-index: 1000;">
    <div class="container-fluid">
        <button class="navbar-toggler border-0 " data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link me-4 text-nav" aria-current="page" href="/">HOME</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown text-nav me-4" href="/product" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        PRODUCTS
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="/product?malsp=L01">Đồng hồ Nam</a></li>
                        <li><a class="dropdown-item" href="/product?malsp=L02">Đồng hồ Nữ</a></li>
                        <li><a class="dropdown-item" href="/product">Tất cả</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="me-4 nav-link text-nav" href="Product.php">SERVICES</a>
                </li>
                <li class="nav-item">
                    <a class="me-4 nav-link text-nav" href="#">NEWS</a>
                </li>
                <li class="nav-item">
                    <a class="me-4 nav-link text-nav" href="#">CONTACT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>