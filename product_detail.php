<?php
include('./header_base.php');

$id = $_GET['id'];

$Productdetail_query = "SELECT * FROM `product` WHERE `id`= $id";
$Productdetail_result = mysqli_query($conn, $Productdetail_query);
$productdetail_row = mysqli_fetch_assoc($Productdetail_result);


?>
<section class="bg-light bg-opacity-25 ">
    <div class="container m-auto">
        <div class="row">
            <div class="col-md-5 bg-white mt-5 mb-5">
                <div class="card rounded-0">
                    <img src="./productimage/<?php echo $productdetail_row['image']; ?>" class="card-img image-fluid rounded-0">
                </div>
            </div>
            <div class="col-md-7 mt-5 mb-5">
                <div class="card rounded-0">
                    <div class="card-body">
                        <p class="card-title h3 fw-light pb-1"><?php echo $productdetail_row['product name']; ?></p>
                        <p class="h5 fw-light pb-1"><?php echo '$' . $productdetail_row['price'] . '.00'; ?></p>
                        <div class=" h6 fw-light pb-1">
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-solid fa-star text-warning"></i>
                            <i class="fa-duotone fa-solid fa-star text-secandary opacity-50"></i>
                            <i class="fa-duotone fa-solid fa-star text-secandary opacity-50"></i>
                            <span>Rating 3.8</span>
                        </div>
                        <p class="h6 fw-light pb-1">Description</p>
                        <p class="h6 fw-light pb-1"><?php echo $productdetail_row['description']; ?></p>
                        <div class="row">
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <button class="btn btn-outline-secondary"

                                        type="button" id="quantity_minus"><i class="fa-solid fa-minus text-success"></i>
                                    </button>

                                    <input readonly class="form-control text-center quantityInput"
                                        data-id="<?php echo $productdetail_row['id'] ?>" data-quantity="1"
                                        value="1">

                                    <button class="btn btn-outline-secondary" type="button" id="quantity_plus"><i class="fa-solid fa-plus text-success"></i></button>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-success w-100 add_to_cart" href="add_to_cart.php?id=<?php echo $productdetail_row['id']; ?>&quantity=<?php echo $productdetail_row['quantity']; ?>">ADD TO CART</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(function() {
        $('#quantity_minus').on('click', function() {

            let parent = $(this).parent();
            let input = parent.find('.quantityInput');
            let id = input.data('id');

            let quantity = parseInt(input.val(), 10) || 0;
            let newQuantity = quantity - 1;

            input.val(newQuantity);
            $('.add_to_cart').attr('href', `add_to_cart.php?id=${id}&quantity=${newQuantity}`);
        })

        $('#quantity_plus').on('click', function() {
            let parent = $(this).parent();
            let input = parent.find('.quantityInput');
            let id = input.data('id');

            let quantity = parseInt(input.val(), 10) || 0;
            let newQuantity = quantity + 1;

            input.val(newQuantity);
            $('.add_to_cart').attr('href', `add_to_cart.php?id=${id}&quantity=${newQuantity}`);
        });

    })
</script>
<?php
include("./footer_base.php");
?>