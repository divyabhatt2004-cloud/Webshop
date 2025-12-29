<?php
include('./header_base.php');

$user_id = $_SESSION['user_id'];

$user_query = "SELECT * FROM `user` WHERE `id` ='$user_id'";
$user_result = mysqli_query($conn, $user_query);
$user_row = mysqli_fetch_assoc($user_result);

if (isset($_POST['user_password']) && $_POST['user_password']) {
 
    $user_input_password = $_POST['current_password'];
    if($user_row['password'] == $user_input_password){
        ?>
        <!-- <script>
            $(document).ready(function() {
                $('#Check_password').hide();
            })
         </script> -->
        <?php
        echo 'matched';
    } 
    else{
        echo 'not matched';
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
                            </div>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-success text-white ms-10 mt-4" name="user_password"
                                value="Check"></input>
                                <!-- <label for="user_email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="user_email" id="user_email"
                                    placeholder="Email" required> -->
                            </div>
                        </div>
                        <div class="">
                        <div class="row mb-2 mt-4 ">
                                    <div class="col-md-6">
                                        <label for="user_password" class="form-label">Password</label>
                                        <div class="input-group" id="password">
                                            <input type="password" class="form-control" style="border-right: none ;" name="user_password" autocomplete="off"
                                                id="user_password" placeholder="Password" required>
                                            <span class="p-2 input-group-text"><i class="fa-solid fa-eye"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="confirmUser_password" class="form-label">Confirm Password</label>
                                        <div class="input-group" id="confirmPassword">
                                            <input type="password" class="form-control" style="border-right: none ;" name="confirmUser_password" autocomplete="off"
                                                id="confirmUser_password" placeholder="Confirm Password" required>
                                            <span class="p-2 input-group-text"><i class="fa-solid fa-eye"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        <!-- <div class="mt-4 text-end">
                            <input type="submit" class="btn btn-success text-white" name="user_address"
                                value="Update"></input>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include("./footer_base.php");
?>