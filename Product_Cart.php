<?php
include('./Connect.php');


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
    <?php
    include("./Nav.php");
    ?>
    <section>
        <div class="container">
            <div class="row mt-5 mb-5">
                <table class="table w-100">
                    <thead>
                        <tr>
                            <th>Srno</th>
                            <th>Image</th>
                            <th>Product_name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sno = 0;
                        $sub_amount = 0;
                        $gst_amount = 0;
                        while ($Cart_rows = mysqli_fetch_assoc($Cart_Result)) {
                            $sno++;
                            $sub_amount += $Cart_rows["price"] * $Cart_rows['quantity'];


                        ?>
                            <tr>
                                <td><?php echo   $sno; ?></td>
                                <td class="w-25"><img src="./productimage/<?php echo $Cart_rows['image'] ?>" class="w-25 rounded-0"></td>
                                <td><?php echo $Cart_rows['product name'] ?></td>
                                <td><?php echo $Cart_rows['description'] ?></td>
                                <td><?php echo $Cart_rows['quantity'] ?></td>
                                <td><?php echo $Cart_rows['price'] ?></td>
                                <td><?php
                                    $total = $Cart_rows['quantity'] * $Cart_rows['price'];
                                    echo $total;
                                    ?></td>
                                <!-- GST Amount = (Original Price × GST Rate) / 100
                                        Total Price (Inclusive of GST) = Original Price + GST Amount  -->
                                <td><a href="./product_detail.php?id=<?php echo $Cart_rows['product_id']; ?>"
                                        class="text-success ms-2">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a class="text-danger ms-2" href="delete_from_cart.php?id=<?php echo $Cart_rows['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                        <?php
                            $gst_amount += ($Cart_rows["gst"] * $total) / 100;
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-4 offset-8">
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-6 text-start">
                                    <p class="h6 fw-light">Subtotal</p>
                                    <p class="h6 fw-light">GST</p>
                                    <p class="h6 fw-light">Grand_Total</p>
                                </div>
                                <div class="col-6 text-end">
                                    <div>
                                        <?php echo '$'.$sub_amount.'.00'; ?>
                                    </div>
                                    <div>
                                        <?php echo '$'.$gst_amount.'.00'; ?>
                                    </div>
                                    <div>
                                        <?php echo '$'.$sub_amount + $gst_amount.'.00'; ?>
                                    </div>
                                    <div class="mt-2">
                                        <a  class="btn btn-success text-white" href="Cart_Checkout.php">Checkout</a>
                                    </div>
                                </div>
                            </div>
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