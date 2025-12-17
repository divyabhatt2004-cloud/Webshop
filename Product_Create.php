<?php
include('./Connect.php');
include('./header_base.php');
include("./nav.php");

if (!$_SESSION['isLogin']) {
    header('Location:Login_User.php');
}

if (isset($_POST['save']) && $_POST['save']) {
    $product_name = $_POST['pname'];

    $description = $_POST['desc'];
    $quantity = $_POST['quanity'];
    $category = $_POST['cate'];
    $price = $_POST['price'];
    $gst = $_POST['gst'];

    $imageArr = $_FILES['proimage'];
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


    $productquery = " INSERT INTO `product`(`product name`,`image`,`description`, `quantity`, `category`, `price`,`gst`) VALUES ('$product_name','$filename','$description','$quantity','$category','$price','$gst')";

    $productresult = mysqli_query($conn, $productquery);
    if ($productresult) {
        header("Location:./Product_Admin.php");
    }
}
$categoryquery = "SELECT * FROM `categories`";
$categorydata = mysqli_query($conn, $categoryquery);
?>
<div class="container">
    <div class="row text-center mt-3">
        <p class="h1">Add product</p>
    </div>
    <div class="row">
        <form method="post" class="mt-5 mb-5" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6 col-md-4">
                    <label for="pname" class="form-label">Product Name</label>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="pname" id="pname" placeholder="Product Name" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <label for="proimage" class="form-label">Upload image</label>
                    <div class="mb-3">
                        <input type="file" class="form-control" name="proimage" id="proimage">
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
                <div class="col-lg-6 col-md-4">
                    <label for="quanity" class="form-label">Quanity</label>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="quanity" id="quanity" placeholder="0" required>
                    </div>
                    <label for="cate" class="form-label">Categories</label>
                    <div>
                        <select class="form-select" name="cate" id="cate">
                            <?php while ($categoryrow = mysqli_fetch_assoc($categorydata)) {
                            ?>
                                <option value="<?php echo $categoryrow['id']; ?>"><?php echo $categoryrow['category name']; ?></option>
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
                        <input type="text" class="form-control" name="price" id="price" placeholder="Price" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <label for="gst" class="form-label">GST</label>
                    <input type="text" class="form-control" name="gst" id="gst" placeholder="GST" required>
                </div>
            </div>
            <div class="col-6 offset-6 text-end pt-2 mt-4">
                <input type="submit" class="btn btn-success text-white fs-5" name="save" value="SAVE"></input>
            </div>
        </form>
    </div>
</div>
<?php
include("./footer.php");
include("./footer_base.php");
?>