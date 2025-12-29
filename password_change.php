<?php
include('./header_base.php');

$user_id = $_SESSION['user_id'];

$error = null;

if (isset($_POST['change']) && $_POST['change']) {
 
    $user_password = $_POST['user_password'];
    $user_confirm_password = $_POST['confirmUser_password'];
    
    if ($user_password == $user_confirm_password) {

    $change_password_query = "UPDATE `user` SET `password`='$user_password' WHERE `id`='$user_id'";
    $change_password_result = mysqli_query($conn, $change_password_query);

        if (!($change_password_result)){
            $error = "failed to change password";
            exit;
        }
        else{
            header('location:index.php');
        }
    }
    else{
        $error = "Password doesn't match";
    }
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mt-5 shadow">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <p class="h3 fw-light">Create a new password</p>
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
                        <div class="col-lg-6 col-sm-8">
                            <form method="post">
                                <div class="row mb-2 mt-4 ">
                                    <div class="col-md-12">
                                        <label for="user_password" class="form-label">Password</label>
                                        <div class="input-group" id="password">
                                            <input type="password" class="form-control" style="border-right: none ;" name="user_password" autocomplete="off"
                                                id="user_password" placeholder="Password" required>
                                            <span class="p-2 input-group-text"><i class="fa-solid fa-eye"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <label for="confirmUser_password" class="form-label">Confirm Password</label>
                                        <div class="input-group" id="confirmPassword">
                                            <input type="password" class="form-control" style="border-right: none ;" name="confirmUser_password" autocomplete="off"
                                                id="confirmUser_password" placeholder="Confirm Password" required>
                                            <span class="p-2 input-group-text"><i class="fa-solid fa-eye"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-12 mb-3 mt-3">
                                        <input type="submit" name="change" value="CHANGE PASSWORD" class="btn btn-primary w-100"></input>
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