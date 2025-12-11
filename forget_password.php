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
                            <div class="col-12 text-center mb-2 h4">
                                <span>
                                    Forget Password ?
                                </span>
                            </div>
                            <div class="col-12 text-center mb-2">
                                Remember your Password? <a href="Login_User.php">login here</a>
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
                                        <div class="col-12 mb-3 text-end">
                                            <a href="google.com">Try another way</a>
                                        </div>
                                    </div>

                                    <div class="row text-center">
                                        <div class="col-12 mb-3">
                                            <button type="button" class="btn btn-primary w-100">
                                                CONTINUE
                                            </button>
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
</body>

</html>