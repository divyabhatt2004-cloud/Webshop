<?php
include "./Connect.php";

if (isset($_POST['save_user']) && $_POST['save_user']) {

  $user_name    = $_POST['user_name'];
  $user_email   = $_POST['user_email'];
  $user_password = $_POST['user_password'];
  

  $user_query = "INSERT INTO `user`(`name`, `email`, `password`) VALUES ('$user_name','$user_email','$user_password')";

  $user_result = mysqli_query($conn, $user_query);

  if (!$user_result) {
    echo "submittion failed";
  }
}
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
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card mt-5 shadow">
                    <div class="card-body">
                        <div class="row justify-content-center mb-3">
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
                                            <input type="password" class="form-control mb-3" name="user_password"
                                                id="user_password" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mb-2">
                                        <div class="col-6">
                                            <input type="checkbox" name="check1" class="form-check-input" id="check1"
                                                checked>
                                            <label for="check1" class="form-check-label">remember me</label>
                                        </div>
                                        <div class="col-6 mb-3 text-end">
                                            <a href="forget_password.php"> Forget password?</a>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col-12 mb-3">
                                            <input type="submit" class="btn btn-primary w-100" name="save_user"value="SIGN UP"></input>
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
</body>

</html>