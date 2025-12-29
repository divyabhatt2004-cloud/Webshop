<?php
include('./header_base.php');

$error = null;

if (isset($_POST['save_user']) && $_POST['save_user']) {

    $user_name    = $_POST['user_name'];
    $user_email   = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $userConfirm_password =  $_POST['confirmUser_password'];

    $userCheck = "SELECT * from `user` where `email` = '$user_email'";
    $user = mysqli_query($conn, $userCheck);

    if (mysqli_num_rows($user) > 0) {
        $error = 'This user already exist';
    } else {
        if ($user_password == $userConfirm_password) {

            $user_query = "INSERT INTO `user`(`name`, `email`, `password`) VALUES ('$user_name','$user_email','$user_password')";

            $user_result = mysqli_query($conn, $user_query);

            $userLogin_query = "SELECT `id` FROM `user` WHERE`email`= '$user_email' AND `password`= '$user_password'";
            $userLogin_result = mysqli_query($conn, $userLogin_query);
            $userLogin_row = mysqli_fetch_assoc($userLogin_result);

            $user_id = $userLogin_row['id'];

            $user_detailQuery = "INSERT INTO `user_details`(`user_id`,`user_name`, `user_email`)VALUES ('$user_id','$user_name','$user_email')";
            $user_detailResult = mysqli_query($conn, $user_detailQuery);

            if ($user_result) {

                $_SESSION["user_id"] = $userLogin_row['id'];
                $_SESSION['isLogin'] = true;
                header('location:index.php');
            }
        } else {
            $error = "Password doesn't match";
        }
    }
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mt-5 shadow">
                <div class="card-body">
                    <div class="row justify-content-center mb-3 ">
                        <div class="col-12 text-center mb-2">
                            <span>Sign up:</span>
                        </div>
                        <div class="col-12 d-flex justify-content-center my-2 mb-2">
                            <span class="rounded-circle bg-primary text-white p-1 text-center me-2">
                                <i class="fa-brands fa-facebook-f"></i>
                            </span>

                            <span class="rounded-circle bg-primary text-white text-center p-1  me-2">
                                <i class="fa-brands fa-google"></i>
                            </span>

                            <span class="rounded-circle bg-primary text-white me-2 text-center p-1">
                                <i class="fa-brands fa-twitter"></i>
                            </span>

                            <span class="rounded-circle bg-primary text-white me-2 text-center p-1">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </span>

                        </div>
                        <div class="col-12 text-center">
                            <span>Or:</span>
                        </div>
                    </div>
                    <div class="row justify-content-center ">
                        <div class="col-6 text-center">
                            <div class="alert alert-danger border <?php echo empty($error) ? 'd-none' : ''; ?>" id="alertmsg">
                                <p class="text-danger">
                                    <?php echo $error; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class=" col-lg-6 col-sm-8">
                            <form method="post">
                                <div class="row justify-content-center mb-2">
                                    <div class="col-12">
                                        <label for="user_name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-2">
                                    <div class="col-12">
                                        <label for="user_email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-2">
                                    <div class="col-12">
                                        <label for="user_password" class="form-label">Password</label>
                                        <div class="input-group" id="password">
                                            <input type="password" class="form-control" style="border-right: none ;" name="user_password" autocomplete="off"
                                                id="user_password" placeholder="Password" required>
                                            <span class="p-2 input-group-text"><i class="fa-solid fa-eye"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-2">
                                    <div class="col-12">
                                        <label for="confirmUser_password" class="form-label">Confirm Password</label>
                                        <div class="input-group" id="confirmPassword">
                                            <input type="password" class="form-control" style="border-right: none ;" name="confirmUser_password" autocomplete="off"
                                                id="confirmUser_password" placeholder="Confirm Password" required>
                                            <span class="p-2 input-group-text"><i class="fa-solid fa-eye"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-2">
                                    <div class="col-6">
                                        <input type="checkbox" name="check1" class="form-check-input" id="check1"
                                            checked>
                                        <label for="check1" class="form-check-label">remember me</label>
                                    </div>
                                    <div class="col-6 mb-3 text-end">
                                        <a href="forgot_password.php">Forget password?</a>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-12 mb-3">
                                        <input type="submit" class="btn btn-primary w-100" name="save_user" id="reg_user" value="SIGN UP"></input>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            Already a member?
                            <a href="login.php">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $('#password i').on('click', function() {
            $(this).toggleClass('fa-eye fa-eye-slash')
            var x = document.getElementById("user_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        })

        $('#confirmPassword i').on('click', function() {
            $(this).toggleClass('fa-eye fa-eye-slash')
            var x = document.getElementById("confirmUser_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        })
    })
</script>
<?php 
include("./footer_base.php");
?>