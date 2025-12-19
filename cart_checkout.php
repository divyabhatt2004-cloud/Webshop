<?php
include "./connect.php";
include('./header_base.php');
include("./nav.php");

$Cart_Query = "SELECT * FROM `cart`";
$Cart_Result = mysqli_query($conn, $Cart_Query);

$id = $_GET['id'];
$user_query = "SELECT `user_name`, `user_email` FROM `user_details` WHERE `id`= '$id'";
$user_result = mysqli_query($conn, $user_query);
$user_row = mysqli_fetch_assoc($user_result);

if (isset($_POST['user_address']) && $_POST['user_address']) {

    $user_street = $_POST['user_street'];
    $user_locality = $_POST['user_locality'];
    $user_city = $_POST['user_city'];
    $user_state = $_POST['user_state'];
    $user_pincode = $_POST['user_pincode'];
    $user_country = $_POST['user_country'];

    $user_detailQuery = "INSERT INTO `user_details`(`street`, `locality`, `city`, `state`, `pincode`, `country`) VALUES ('$user_street','$user_locality','$user_city','$user_state','$user_pincode','$user_country')";
    $User_detailResult = mysqli_query($conn, $user_detailQuery);

    if (!$User_detailResult) {
        echo 'failed';
    }
}

?>
<div class="container mb-5">
    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body">
                    <div class="form" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="user_name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Name" value="<?php echo $user_row['user_name']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="user_email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Email" value="<?php echo $user_row['user_email']; ?>">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <p class="h5">Billing Address</p>
                        </div>
                        <div class="row mt-2 mb-2">
                            <div class="col-md-6">
                                <label for="user_street" class="form-label">Street</label>
                                <input type="text" class="form-control" name="user_street" id="user_street" placeholder="Street" required>
                            </div>
                            <div class="col-md-6">
                                <label for="user_locality" class="form-label">Locality</label>
                                <input type="text" class="form-control" name="user_locality" id="user_locality" placeholder="Locality" required>
                            </div>
                        </div>
                        <div class="row mt-2 mb-2">
                            <div class="col-md-6">
                                <label for="user_city" class="form-label">City</label>
                                <input type="text" class="form-control" name="user_city" id="user_city" placeholder="City" required>
                            </div>
                            <div class="col-md-6">
                                <label for="user_state" class="form-label">State</label>
                                <input type="text" class="form-control" name="user_state" id="user_state" placeholder="State" required>
                            </div>
                        </div>
                        <div class="row mt-2 mb-2">
                            <div class="col-md-6">
                                <label for="user_pincode" class="form-label">Pincode</label>
                                <input type="text" class="form-control" name="user_pincode" id="user_pincode" placeholder="Pincode" required>
                            </div>
                            <div class="col-md-6">
                                <label for="user_country" class="form-label">Contury</label>
                                <input type="text" class="form-control" name="user_country" id="user_country" placeholder="Contury" required>
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
                                <?php echo '$' . $sub_amount . '.00'; ?>
                            </div>
                            <div>
                                <?php echo '$' . $gst_amount . '.00'; ?>
                            </div>
                            <div>
                                <?php echo '$' . $sub_amount + $gst_amount . '.00'; ?>
                            </div>
                            <div class="mt-2">
                                <input type="submit" class="btn btn-success text-white" name="user_address" value="Proceed"></input>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("./footer.php");
include("./footer_base.php");
?>