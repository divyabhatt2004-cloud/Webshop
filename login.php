<?php
include('./header_base.php');

if (isset($_POST["login_user"]) && $_POST["login_user"]) {

    $userlogin_email = $_POST["userlog_email"];
    $userlogin_password = $_POST["loguser_password"];

    $userLogin_query = "SELECT * FROM `user` WHERE `email`= '$userlogin_email' AND `password`= '$userlogin_password'";

    $userLogin_result = mysqli_query($conn, $userLogin_query);

    if (mysqli_num_rows($userLogin_result) > 0) {

        $userLogin_row = mysqli_fetch_assoc($userLogin_result);

        $_SESSION["user_id"] = $userLogin_row['id'];
        $_SESSION["user_type"] = $userLogin_row['user_type'];

        $_SESSION['isLogin'] = true;

        header('Location:index.php');
    } else {
        $_SESSION['isLogin'] = false;
        echo 'error';
    }
}

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mt-5 shadow">
                <div class="card-body">
                    <div class="row justify-content-center mb-3">
                        <div class="col-12 text-center mb-2">
                            <span>Sign in:</span>
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

                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-sm-8">
                            <form method="post">
                                <div class="row justify-content-center mb-2">
                                    <div class="col-12">
                                        <label for="userlog_email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="userlog_email" id="userlog_email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-2">
                                    <div class="col-12">
                                        <label for="loguser_password" class="form-label">Password</label>
                                        <div class="input-group" id="log_password">
                                            <input type="password" class="form-control" style="border-right: none ;" name="loguser_password" autocomplete="off"
                                                id="loguser_password" placeholder="Password" required>
                                            <span class="p-2 input-group-text"><i class="fa-solid fa-eye"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-2">
                                    <div class="col-12 mb-3 text-end">
                                        <a href="forgot_password.php"> Forget password?</a>
                                    </div>
                                </div>

                                <div class="row text-center">
                                    <div class="col-12 mb-3">
                                        <input type="submit" name="login_user" value="SIGN IN" class="btn btn-primary w-100"></input>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-12 text-center">
                                        Not a member?
                                        <a href="register.php">Register</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#log_password i').on('click', function() {
        $(this).toggleClass('fa-eye fa-eye-slash')
        var x = document.getElementById("loguser_password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    })
</script>
<?php
include("./footer_base.php");
?>