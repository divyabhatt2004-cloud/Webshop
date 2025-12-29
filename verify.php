<?php
ob_start();
include('./header_base.php');

$user_id = $_SESSION['user_id'];

$error = null;

$user_query = "SELECT * FROM `user` WHERE `id` ='$user_id'";
$user_result = mysqli_query($conn, $user_query);
$user_row = mysqli_fetch_assoc($user_result);

if (isset($_POST['user_password']) && $_POST['user_password']) {
 
    $user_input_password = $_POST['current_password'];
    if($user_row['password'] == $user_input_password){
        header('Location:password_change.php');  
    } 
    else{
        $error = "invalid password";
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
                    <a class="list-group-item text-success border-0 mb-1" href="change_password.php">Change password</a>
                    <a class="list-group-item text-success border-0 mb-1" href="logout.php">Log out</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <form method="post">
                        <div class="row" id="Check_password">
                            <div class="col-md-6">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="text" class="form-control" name="current_password" id="current_password"
                                    placeholder="Password" required>
                                    <div class="row justify-content-center ">
                                        <div class="col-12 text-center mt-3">
                                            <div class="alert alert-danger border <?php echo empty($error) ? 'd-none' : ''; ?>" 
                                            id="alertmsg">
                                                <p class="text-danger">
                                                    <?php echo $error; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="mt-3" href="forgot_password.php"> Forget password?</a>
                            </div>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-success text-white ms-10 mt-4" name="user_password"
                                value="Verify"></input>
                            </div>
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