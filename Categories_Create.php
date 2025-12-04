<?php
include('./Connect.php');

if (isset($_POST['savecate']) && $_POST['savecate']) {
    $catename    = $_POST['cname'];
    $catetype  = $_POST['ctype'];
    $catedesc = $_POST['desc'];


    $categoryquery = "INSERT INTO `categories`(`category name`, `category type`, `description`) VALUES ('$catename','$catetype','$catedesc')";

    $categoryresult = mysqli_query($conn, $categoryquery);

    if ($categoryresult) {
        header("Location:./Categories_Admin.php");
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
    <?php
    include("./Nav.php");
    ?>
    <div class="container">
        <div class="row text-center mt-3">
            <p class="h1">Category</p>
        </div>
        <div class="row">
            <form method="post" class="mt-5 mb-5">
                <div class="row">
                    <div class="col-lg-6 col-md-4">
                        <label for="cname" class="form-label">Category Name</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="cname" id="cname" placeholder="Category Name" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <label for="ctype" class="form-label">Categaory Type</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="ctype" id="ctype" placeholder="Categaory Type" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-4">
                        <label for="desc" class="form-label">Description</label>
                        <div class="mb-3">
                            <textarea rows="5" type="text" class="form-control" name="desc" id="desc"></textarea>
                        </div>
                    </div>
                    <div class="col-6 text-end pt-2 mt-4">
                        <input type="submit" class="btn btn-success text-white fs-5" name="savecate" value="SAVE"></input>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    include("./Footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>