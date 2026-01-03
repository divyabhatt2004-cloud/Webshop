<?php
ob_start();
include('./header_base.php');

$user_id = $_SESSION['user_id'];

// if(mysqli_num_rows($user_result) > 0)
if (isset($_POST['submit_contact']) && $_POST['submit_contact']) {
  $name    = $_POST['name'];
  $email   = $_POST['email'];
  $subject = $_POST['subject'];
  $mesaage = $_POST['message'];

  $user_query = "SELECT * FROM `contact_us` WHERE `user_id`= '$user_id'";
  $user_result = mysqli_query($conn, $user_query);

  if (mysqli_num_rows($user_result) == 0) {

    if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] === true) {
      $contact_query = "INSERT INTO `contact_us`(`user_id`,`name`, `email`, `subject`, `message`) VALUES ('$user_id','$name','$email','$subject','$mesaage')";
      $contact_result = mysqli_query($conn, $contact_query);

      if ($contact_result) {
        header("Location:./contact.php");
      }
      else{
        echo "error";
      }
    } else {
      header('Location:./login.php');
    }
  } else {
    $queryuserupdate = "UPDATE `contact_us` SET `name`='$name',`email`='$email',`subject`='$subject',`message`='$mesaage' WHERE `user_id`= '$user_id'";
    $resultuserupdate = mysqli_query($conn, $queryuserupdate);
    if ($resultuserupdate) {
        header("Location:./contact.php");
    } else {
        echo 'failed';
    }
  }
}
?>
<div class="container-fluid pt-5">
  <div class="row text-center justify-content-betweem fw-light pb-3">
    <p class="h1 fw-light">Contact Us</p>
    <p class="fw-light">Proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet.</p>
  </div>
  <div class="row">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54872.06042458111!2d76.7295140686255!3d30.7323477217881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fed0be66ec96b%3A0xa5ff67f9527319fe!2sChandigarh!5e0!3m2!1sen!2sin!4v1764049652277!5m2!1sen!2sin"
      width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade" class="ps-0 pe-0"></iframe>
  </div>
</div>
<div class="container pt-5">
  <div class="row justify-content-center pb-5">
    <form class="col-9  ms-10" method="post">
      <div class="row">
        <div class="col-lg-6 col-md-4">
          <label for="name1" class="form-label">Name</label>
          <div class="mb-3">
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <label for="email1" class="form-label">Email</label>
          <div class="mb-3">
            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required>
          </div>
        </div>
      </div>
      <div class="row">
        <label for="subject1" class="form-label">Subject</label>
        <div class="mb-3">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
        </div>
      </div>
      <div class="row">
        <label for="message1" class="form-label">Message</label>
        <div class="mb-3">
          <textarea rows="5" class="form-control" name="message" id="message" placeholder="Message" required></textarea>
        </div>
      </div>
      <div class="col-6 text-end offset-6 pt-2">
        <input type="submit" class="btn btn-success text-white fs-5" name="submit_contact" value="Let's Talk"></input>
      </div>
    </form>
  </div>
</div>
<?php
include("./footer_base.php");
?>