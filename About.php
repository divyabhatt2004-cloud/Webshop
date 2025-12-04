<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php
    include("./Nav.php");
    ?>
    <section class="bg-success">
        <div class="container pt-5 pb-5">
            <div class="row p-5">
                <div class="mx-auto col-md-6 col-lg-4 order-lg-last">
                    <img class="img-fluid h-100" src="./images/4.jpg" alt="4">
                </div>
                <div class="col-lg-8 col-md-6 mb-0 d-flex align-items-center text-white">
                    <div class="text-align-left align-self-center">
                        <h1 class="h1"><b>About Us</b></h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container text-center mt-5 mb-5">
        <div class="row text-center">
            <div class="col-6 m-auto">
                <h1 class="h1 fw-light">Our Services</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit
                    amet.</p>
            </div>
        </div>
        <div class="container mt-5 mb-10">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center pb-5">
                    <div
                        class="mb-3 text-center  align-items-center mt-3 pt-5 pb-5 fs-1 service-icon-wap border shadow">
                        <i class="fa fa-truck fa-lg text-success mb-5"></i>
                        <h5>Delivery Services</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center pb-5">
                    <div
                        class="mb-3 text-center  align-items-center mt-3 pt-5 pb-5 fs-1 service-icon-wap border shadow">
                        <i class="fa-solid fa-arrow-right-arrow-left text-success mb-4"></i>
                        <h5>Shipping & Return</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center pb-5">
                    <div
                        class="mb-3 text-center  align-items-center mt-3 pt-5 pb-5 fs-1 service-icon-wap border shadow">
                        <i class="fa-solid fa-percent text-success mb-4"></i>
                        <h5>Promotion</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center pb-5">
                    <div
                        class="mb-3 text-center  align-items-center mt-3 pt-5 pb-5 fs-1 service-icon-wap border shadow">
                        <i class="fa-solid fa-user text-success mb-4"></i>
                        <h5>24 Hours Service</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-secondary bg-opacity-50 ">
        <div class="container pt-5 pb-5 text-center">
            <div class="row text-body mt-3">
                <div class="col-6 m-auto">
                    <p class="fw-light h1">Our Brands</p>
                    <p class="fw-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum
                        dolor sit amet.</p>
                </div>
            </div>
            <div class="container mt-5 mb-5">
                <div id="carousel" class="carousel slide carousel-dark mb-10" data-bs-ride="carousel">
                    <div class="row ">
                        <div class="col-2">
                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                        </div>
                        <div class="col-8">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-3">
                                            <img class="img-fluid brand-img" src="./images/brand_01.png" alt="Brand Logo">
                                        </div>
                                        <div class="col-3">
                                            <img class="img-fluid brand-img" src="./images/brand_02.png" alt="Brand Logo">
                                        </div>
                                        <div class="col-3">
                                            <img class="img-fluid brand-img" src="./images/brand_03.png" alt="Brand Logo">
                                        </div>
                                        <div class="col-3">
                                            <img class="img-fluid brand-img" src="./images/brand_04.png" alt="Brand Logo">
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item ">
                                    <div class="row">
                                        <div class="col-3">
                                            <img class="img-fluid brand-img" src="./images/brand_01.png" alt="Brand Logo">
                                        </div>
                                        <div class="col-3">
                                            <img class="img-fluid brand-img" src="./images/brand_02.png" alt="Brand Logo">
                                        </div>
                                        <div class="col-3">
                                            <img class="img-fluid brand-img" src="./images/brand_03.png" alt="Brand Logo">
                                        </div>
                                        <div class="col-3">
                                            <img class="img-fluid brand-img" src="./images/brand_04.png" alt="Brand Logo">
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-3">
                                            <img class="img-fluid brand-img" src="./images/brand_01.png" alt="Brand Logo">
                                        </div>
                                        <div class="col-3">
                                            <img class="img-fluid brand-img" src="./images/brand_02.png" alt="Brand Logo">
                                        </div>
                                        <div class="col-3">
                                            <img class="img-fluid brand-img" src="./images/brand_03.png" alt="Brand Logo">
                                        </div>
                                        <div class="col-3">
                                            <img class="img-fluid brand-img" src="./images/brand_04.png" alt="Brand Logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include("./Footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>