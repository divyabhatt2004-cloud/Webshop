<?php
include('./Connect.php');

$product_query = "SELECT * FROM `product`";
$product_result = mysqli_query($conn, $product_query);
$product_rows = mysqli_fetch_assoc($product_result);

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
            <div class="row justify-content-center mt-5 mb-5">
                <div class="col-md-8">
                    <table>
                        <thead>
                            <tr>
                                <th>Srno</th>
                                <th>Image</th>
                                <th>Product_name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 0;
                            while ($Cart_rows = mysqli_fetch_assoc($Cart_Result)) {
                                $sno++;
                            ?>
                                <tr>
                                    <td><?php echo   $sno; ?></td>
                                    <td class="w-25"><img src="./productimage/<?php echo $Cart_rows['image'] ?>" class="w-25 rounded-0"></td>
                                    <td><?php echo $Cart_rows['product name'] ?></td>
                                    <td><?php echo $Cart_rows['description'] ?></td>
                                    <td><?php echo $Cart_rows['quantity'] ?></td>
                                    <td><?php echo $Cart_rows['price'] ?></td>
                                    <td><a href="./product_detail.php?id=<?php echo $product_rows['id']; ?>"
                                            class="text-success ms-2">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                         <!-- #region<a class="text-success ms-2" href="Product_Update.php?id=<?php echo $product_rows['id']; ?>"><i class="fa-solid fa-pen"></i></a>-->
                                        <a class="text-danger ms-2" href="delete_from_cart.php?id=<?php echo $Cart_rows['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
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