<?php
include "./Connect.php";

//$user_query = "SELECT * FROM `user`";
$Cart_Query = "SELECT * FROM `cart`";
$Cart_Result = mysqli_query($conn, $Cart_Query);
?>
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
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="form" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="user_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="user_email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Email">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <p class="h5">Billing Address</p>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col-md-6">
                                    <label for="user_locality" class="form-label">Locality</label>
                                    <input type="text" class="form-control" name="user_locality" id="user_locality" placeholder="Locality" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="user_city" class="form-label">City</label>
                                    <input type="email" class="form-control" name="user_city" id="user_city" placeholder="City">
                                </div>
                            </div>
                            <div class="row mt-2 mb-2">
                                <div class="col-md-6">
                                    <label for="user_state" class="form-label">State</label>
                                    <input type="text" class="form-control" name="user_state" id="user_state" placeholder="State">
                                </div>
                                <div class="col-md-6">
                                    <label for="user_pincode" class="form-label">Pincode</label>
                                    <input type="email" class="form-control" name="user_pincode" id="user_pincode" placeholder="Pincode">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mb-5 shadow">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-6 text-start">
                                <p class="h6 fw-light">Subtotal</p>
                                <p class="h6 fw-light">GST</p>
                                <p class="h6 fw-light">Grand_Total</p>
                            </div>
                            <div class="col-6 text-end">
                                <div>
                                    <?php
                                    $sno = 0;
                                    $sub_amount = 0;
                                    $gst_amount = 0;
                                    while ($Cart_rows = mysqli_fetch_assoc($Cart_Result)) {
                                        $sno++;
                                        $sub_amount += $Cart_rows["price"] * $Cart_rows['quantity'];
                                        $total = $Cart_rows['quantity'] * $Cart_rows['price'];
                                        $gst_amount += ($Cart_rows["gst"] * $total) / 100;
                                    }
                                    ?>
                                    <?php echo '$'.$sub_amount.'.00'; ?>
                                </div>
                                <div>
                                    <?php echo '$'.$gst_amount.'.00'; ?>
                                </div>
                                <div>
                                    <?php echo '$'.$sub_amount + $gst_amount.'.00'; ?>
                                </div>
                                <div class="mt-2">
                                    <a class="btn btn-success text-white" value="Checkout" href="Order_process.php">Proceed</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

</body>

</html>