<?php
include "./connect.php";
include('./header_base.php');
include("./nav.php");

if (!$_SESSION['isLogin']) {
    header('Location:login.php');
}

$userquery = 'SELECT * FROM `contact_us`';
$userresult = mysqli_query($conn, $userquery);
?>
<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-body">
                    <a class="list-group-item border-0 text-success mb-1" href="product_Admin.php">Product</a>
                    <a class="list-group-item text-success border-0 mb-1" href="categories_Admin.php">Categories</a>
                    <a class="list-group-item text-success border-0 mb-1" href="support_Admin.php">Support</a>
                    <a class="list-group-item text-success border-0 mb-1" href="#">Orders</a>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row text-end border-bottom pb-2">
                        <div class=" offset-10 col-lg-2">
                            <button class="btn btn-success"><a href="Contact.php" class="text-white text-decoration-none">Create <i class="fa-solid fa-circle-plus"></i></a></button>
                        </div>
                    </div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Reply</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sno = 0;
                                while ($userrows = mysqli_fetch_assoc($userresult)) {
                                    $sno++;
                                ?>
                                    <tr>
                                        <td><?php echo   $sno; ?></td>
                                        <td><?php echo   $userrows['name']; ?></td>
                                        <td><?php echo   $userrows['email']; ?></td>
                                        <td><?php echo   $userrows['subject']; ?></td>
                                        <td><?php echo   $userrows['message']; ?></td>
                                        <td> <?php echo   $userrows['reply']; ?></td>
                                        <td><a class="text-success ms-2" href="contact_Update.php?id=<?php echo $userrows['id']; ?>"><i class="fa-solid fa-pen"></i></a> <a class="text-danger ms-2" href="Contact_Delete.php?id=<?php echo $userrows['id']; ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $('#dropdown i').on('click', function() {
            $(this).toggleClass('fa-circle-chevron-down fa-circle-chevron-up')
            $('#catelist').toggleClass('d-none')
        })
    })
</script>
<?php
include("./footer.php");
include("./footer_base.php");
?>