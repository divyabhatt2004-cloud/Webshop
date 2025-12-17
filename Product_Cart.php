<?php
include('./Connect.php');
include('./header_base.php');
include("./nav.php");

if (!$_SESSION['isLogin']) {
    header('Location:Login_User.php');
}

$Cart_Query = "SELECT * FROM `cart`";
$Cart_Result = mysqli_query($conn, $Cart_Query);


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
                                    <?php echo '$' . $sub_amount . '.00'; ?>
                                </div>
                                <div>
                                    <?php echo '$' . $gst_amount . '.00'; ?>
                                </div>
                                <div>
                                    <?php echo '$' . $sub_amount + $gst_amount . '.00'; ?>
                                </div>
                                <div class="mt-2">
                                    <a class="btn btn-success text-white" href="Cart_Checkout.php?id=<?php echo $_SESSION["user_id"]; ?>">Checkout</a>
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
include("./footer.php");
include("./footer_base.php");
?>