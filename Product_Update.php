<?php

include('./Connect.php');

$id = $_GET['id'];
$Productquery = "SELECT * FROM `product` WHERE `id`= $id";
$Productresult = mysqli_query($conn, $Productquery);
$Productdata = mysqli_fetch_assoc($Productresult);

if (isset($_POST['update_product']) && $_POST['update_product']) {

    $product_name = $_POST['pname'];
    $imageArr = $_FILES['proimage'];
    $description = $_POST['desc'];
    $quantity = $_POST['quanity'];
    $category = $_POST['cate'];
    $price = $_POST['price'];

    if (is_array($imageArr)) {

        $filename = $imageArr['name'];
        $filetype = $imageArr['type'];
        $fileTmpName = $imageArr['tmp_name'];
        $size = $imageArr['size'];
        $error = $imageArr['error'];

        $uploaddir = 'productimage/';

        if (!is_dir($uploaddir)) {
            mkdir($uploaddir);
        }
        $destination = $uploaddir . basename($filename);

        if (!move_uploaded_file($fileTmpName, $destination)) {

            echo 'error';
        }
    }

    $update_Productquery = "UPDATE `product` SET `product name`='$product_name',`image`='$filename',`description`='$description',`quantity`='$quantity',`category`='$category',`price`='$price' WHERE `id`= $id ";
    $update_Productresult = mysqli_query($conn, $update_Productquery);
    if ($update_Productresult) {
        header("Location:./Product_Admin.php");
    }
}

$CategoryQuery = "SELECT * FROM `categories`";
$CategoryResult = mysqli_query($conn, $CategoryQuery);
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
            <p class="h1">
                Update product</p>
        </div>
        <div class="row">
            <form method="post" class="mt-5 mb-5" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6 col-md-4">
                        <label for="pname" class="form-label">Product Name</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="pname" id="pname" placeholder="Product Name" value="<?php echo $Productdata['product name'] ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <label for="proimage" class="form-label">Upload image</label>
                        <div class="mb-3">
                            <input type="file" class="form-control" name="proimage" id="proimage" value="<?php echo $Productdata['image'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-4">
                        <label for="desc" class="form-label">Description</label>
                        <div class="mb-3">
                            <textarea rows="5" type="text" class="form-control" name="desc" id="desc"><?php echo $Productdata['description'] ?> </textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <label for="quanity" class="form-label">Quanity</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="quanity" id="quanity" placeholder="0" value="<?php echo $Productdata['quantity'] ?>" required>
                        </div>
                        <label for="cate" class="form-label">Categories</label>
                        <div>
                            <select class="form-select" name="cate" id="cate">
                                <?php while ($CategoryRow = mysqli_fetch_assoc($CategoryResult)) {
                                ?>
                                    <option value="<?php echo $CategoryRow['id']; ?>"
                                        <?php echo $Productdata['category'] === $CategoryRow['id'] ? 'selected' : '' ?>>
                                        <?php echo $CategoryRow['category name']; ?>
                                    </option>
                                <?php
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-4">
                        <label for="price" class="form-label">Price</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo $Productdata['price'] ?>" required>
                        </div>
                    </div>
                    <div class="col-6 text-end pt-2 mt-4">
                        <input type="submit" class="btn btn-success text-white fs-5" name="update_product" value="SAVE"></input>
                    </div>
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