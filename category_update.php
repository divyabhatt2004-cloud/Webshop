<?php
ob_start();
include('./header_base.php');

$id = $_GET['id'];
$categoryquery = "SELECT * FROM `categories` WHERE `id`= $id";
$categoryresult = mysqli_query($conn, $categoryquery);
$categorydata = mysqli_fetch_assoc($categoryresult);

if (isset($_POST['saveEcate']) && $_POST['saveEcate']) {

    $catename    = $_POST['cname'];
    $catetype  = $_POST['ctype'];
    $catedesc = $_POST['desc'];

    $categoryUpdatequery = "UPDATE `categories` SET `category name`='$catename',`category type`='$catetype',`description`='$catedesc' WHERE `id`= $id ";
    $categoryUpdateresult = mysqli_query($conn, $categoryUpdatequery);
    if ($categoryUpdateresult) {
        header("Location:./categories_Admin.php");
    }
}
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
                        <input type="text" class="form-control" name="cname" id="cname" placeholder="Category Name" value="<?php echo $categorydata['category name']; ?>" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <label for="ctype" class="form-label">Categaory Type</label>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="ctype" id="ctype" placeholder="Categaory Type" value="<?php echo $categorydata['category type']; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-4">
                    <label for="desc" class="form-label">Description</label>
                    <div class="mb-3">
                        <textarea rows="5" type="text" class="form-control" name="desc" id="desc"><?php echo $categorydata['description']; ?> </textarea>
                    </div>
                </div>
                <div class="col-6 text-end pt-2 mt-4">
                    <input type="submit" class="btn btn-success text-white fs-5" name="saveEcate" value="SAVE"></input>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include("./footer_base.php");
?>