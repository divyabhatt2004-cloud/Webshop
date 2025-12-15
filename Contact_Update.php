<?php
include "./Connect.php";
$id = $_GET["id"];
$userquery = "SELECT * FROM `contact_us` WHERE `id`= $id";
$userresult = mysqli_query($conn, $userquery);
$userdata = mysqli_fetch_assoc($userresult);

if (isset($_POST['update_contact']) && $_POST['update_contact']) {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $subject = $_POST['subject'];
    $mesaage = $_POST['message'];
    $reply = $_POST['reply'];

    $queryuserupdate = "UPDATE `contact_us` SET `name`='$name',`email`='$email',`subject`='$subject',`message`='$mesaage',`reply`='$reply' WHERE `id`= $id";

    $resultuserupdate = mysqli_query($conn, $queryuserupdate);

    if ($resultuserupdate) {
        header("Location:./Support_Admin.php");
    } else {
        echo 'failed';
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
    include("./nav.php");
    ?>
    <div class="container pt-5">
        <div class="row text-center pb-3">
            <p class="h1 fw light">UPDATE</p>
        </div>
        
        <div class="row justify-content-center pb-5">
            <form class="col-9  ms-10" method="post">
                <div class="row">
                    <div class="col-lg-6 col-md-4">
                        <label for="name" class="form-label">Name</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $userdata['name'] ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" value="<?php echo $userdata['email']; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="subject" class="form-label">Subject</label>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="<?php echo $userdata['subject']; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <label for="message" class="form-label">Message</label>
                    <div class="mb-3">
                        <textarea rows="5" class="form-control" name="message" id="message" placeholder="Message" required><?php echo $userdata['message']; ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <label for="reply" class="form-label">Reply</label>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="reply" id="reply" placeholder="Reply" required>
                    </div>
                </div>
                <div class="col-6 text-end offset-6 pt-2">
                    <input type="submit" class="btn btn-success text-white fs-5" name="update_contact" value="Update"></input>
                </div>
            </form>
        </div>
    </div>
    <?php
    include("./footer.php");
    ?>