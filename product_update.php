<?php
include('./header_base.php');

if(!$_SESSION['isLogin'])
{
    header('Location:login.php');
}

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
    $gst = $_POST['gst'];

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

    $update_Productquery = "UPDATE `product` SET `product name`='$product_name',`image`='$filename',`description`='$description',`quantity`='$quantity',`category`='$category',`price`='$price',`gst`='$gst' WHERE `id`= $id ";
    $update_Productresult = mysqli_query($conn, $update_Productquery);
    if ($update_Productresult) {
        header("Location:./product_admin.php");
    }
}

$CategoryQuery = "SELECT * FROM `categories`";
$CategoryResult = mysqli_query($conn, $CategoryQuery);
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
                    <div class="col-lg-6 col-md-4">
                        <label for="gst" class="form-label">GST</label>
                        <input type="text" class="form-control" name="gst" id="gst" placeholder="GST" value="<?php echo $Productdata['gst']?>" required>
                    </div>
                </div>
                <div class="col-6 offset-6 text-end pt-2 mt-4">
                    <input type="submit" class="btn btn-success text-white fs-5" name="update_product" value="SAVE"></input>
                </div>
            </form>
        </div>
    </div>
    <?php
include("./footer_base.php");
?>