<?php

use function PHPSTORM_META\type;

include "layouts/header.php";
include "layouts/navbar.php";
?>
<div class="col-xl-9 col-lg-8 col-md-12">
    <form action="controllers/reviews/edit.review_type.controller.php" method="post">
        <input type="hidden" value="<?= $review['review_id'] ?>" name="review_id">
        <div class="card ctm-border-radius shadow-sm grow">
            <div class="card-header">
                <h4 class="card-title mb-0 d-inline-block">Edit Review Type</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 form-group">
                        <h6 class="card-title mb-0 d-inline-block">Review name</h6>
                        <input type="text" value="" name="start_date" class="form-control" placeholder="Review name">
                    </div>
                    <div class="col-12 form-group">
                        <h6 class="card-title mb-0 d-inline-block">Scheduled name</h6>
                        <input type="text" value="" name="start_date" class="form-control" placeholder="Schedule name">
                    </div>
                    <!-- <div class="col form-group">
                        <input type="text" value="<?= $review['end_date'] ?>" name="end_date" class="form-control datetimepicker" placeholder="Reviews Completion Date">
                    </div> -->
                    <div class="col-md-12 form-group mb-0">
                        <h6 class="card-title mb-0 d-inline-block">Users name</h6>
                        <select class="form-control select">
                            <option selected>Review User </option>
                            <option value="1">Every 3 Months</option>
                            <option value="2">Every 6 Months</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row grow">
            <div class="col-12">
                <div class="submit-section text-center btn-add">
                    <button type="submit" class="btn btn-theme button-1 ctm-border-radius text-white">Save</button>
                    <a href="/reviews" class="btn btn-danger text-white ctm-border-radius "><span></span>Cancle</a>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="sidebar-overlay" id="sidebar_overlay"></div>
<?php include "layouts/footer.php"; ?>