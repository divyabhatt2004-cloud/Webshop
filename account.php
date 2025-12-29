<?php
ob_start();
include('./header_base.php');
$id = $_SESSION["user_id"];
$user_query = "SELECT * FROM `user_details` WHERE `user_id`= '$id'";
$user_result = mysqli_query($conn, $user_query);
$user_row = mysqli_fetch_assoc($user_result);

if (isset($_POST['user_address']) && $_POST['user_address']) {

    $user_houseno = $_POST['house_no'];
    $user_street = $_POST['user_street'];
    $user_locality = $_POST['user_locality'];
    $user_city = $_POST['user_city'];
    $user_state = $_POST['user_state'];
    $user_pincode = $_POST['user_pincode'];
    $user_country = $_POST['user_country'];


    $user_detailQuery = "UPDATE `user_details` SET `house_number`=' $user_houseno',`street`='$user_street',`locality`='$user_locality',
    `city`='$user_city',`state`='$user_state',`pincode`='$user_pincode',`country`='$user_country'
     WHERE `user_id`= '$id'";
    $User_detailResult = mysqli_query($conn, $user_detailQuery);

    if (!$User_detailResult) {
        echo 'failed';
    } else {
        header('Location:account.php');
    }
}
?>
<section class="container pt-5 pb-5">
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-body rounded-circle bg-light border border-black w-50 p-5 m-auto mt-3 mb-3">
                    <img src="" class="card-img rounded-circle img-fluid w-50 p-5">
                </div>
                <div class="card-body">
                    <a class="list-group-item border-0 text-success mb-1" href="account.php">Personal data</a>
                    <a class="list-group-item text-success border-0 mb-1" href="wishlist.php">Wishlist</a>
                    <a class="list-group-item text-success border-0 mb-1" href="#">Orders</a>
                    <a class="list-group-item text-success border-0 mb-1" href="verify.php">Change password</a>
                    <a class="list-group-item text-success border-0 mb-1" href="logout.php">Log out</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="user_name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="user_name" id="user_name"
                                    placeholder="Name" value="<?php echo $user_row['user_name']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="user_email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="user_email" id="user_email"
                                    placeholder="Email" value="<?php echo $user_row['user_email']; ?>" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <p class="h5">Billing Address</p>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="house_no" class="form-label">House Number</label>
                                <input type="text" class="form-control" name="house_no" id="house_no"
                                    placeholder="House no." value="<?php echo $user_row['house_number']; ?>" required>
                            </div>
                        </div>
                        <div class="row mt-2 mb-2">
                            <div class="col-md-6">
                                <label for="user_street" class="form-label">Street</label>
                                <input type="text" class="form-control" name="user_street" id="user_street"
                                    placeholder="Street" value="<?php echo $user_row['street']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="user_locality" class="form-label">Locality</label>
                                <input type="text" class="form-control" name="user_locality" id="user_locality"
                                    placeholder="Locality" value="<?php echo $user_row['locality']; ?>" required>
                            </div>
                        </div>
                        <div class="row mt-2 mb-2">
                            <div class="col-md-6">
                                <label for="user_city" class="form-label">City</label>
                                <input type="text" class="form-control" name="user_city" id="user_city"
                                    placeholder="City" value="<?php echo $user_row['city']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="user_state" class="form-label">State</label>
                                <input type="text" class="form-control" name="user_state" id="user_state"
                                    placeholder="State" value="<?php echo $user_row['state']; ?>" required>
                            </div>
                        </div>
                        <div class="row mt-2 mb-2">
                            <div class="col-md-6">
                                <label for="user_pincode" class="form-label">Pincode</label>
                                <input type="text" class="form-control" name="user_pincode" id="user_pincode"
                                    placeholder="Pincode" value="<?php echo $user_row['pincode']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="user_country" class="form-label">Contury</label>
                                <input type="text" class="form-control" name="user_country" id="user_country"
                                    placeholder="Contury" value="<?php echo $user_row['country']; ?>" required>
                            </div>
                        </div>
                        <div class="mt-4 text-end">
                            <input type="submit" class="btn btn-success text-white" name="user_address"
                                value="Update"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include("./footer_base.php");
?>