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
                                <form>
                                    <div class="row justify-content-center mb-2">
                                        <div class="col-12">
                                            <label for="user_email" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Email" required>
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
                                            <a href="forget_password.php"> Forget password?</a>
                                        </div>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-12 mb-3">
                                            <button type="button" class="btn btn-primary w-100">SIGN IN</button>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center">
                                            Not a member?
                                            <a href="Register_User.php">Register</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

</body>

</html>