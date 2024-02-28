<?php require "layouts/header.php";
require "layouts/navbar.php"; ?>
<form action="controllers\leaves\remove.all.leave.controller.php" method="post" class="col-xl-9 col-lg-8  col-md-12">
    <div class="accordion add-employee" id="accordion-details">
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-header" id="basic1">
                <h4 class="cursor-pointer mb-0">
                    Please Confirm you are going to delete.
                </h4>
                <small>Please type: Yes I am sure.</small>
            </div>
            <div class="card-body p-0">
                <div id="basic-one" class="collapse show ctm-padding" aria-labelledby="basic1" data-parent="#accordion-details">
                    <input type="text" name="confirm" class="form-control">
                </div>
                <div id="basic-one" class="collapse show ctm-padding text-center" aria-labelledby="basic1" data-parent="#accordion-details">
                    <button type="submit" name='submit' class="btn btn-outline-danger">Confirm</button>
                </div>
            </div>
        </div>
</form>
<?php require "layouts/footer.php"; ?>