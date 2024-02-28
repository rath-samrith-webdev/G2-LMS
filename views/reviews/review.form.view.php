<?php
include "layouts/header.php";
include "layouts/navbar.php";
?>
<div class="col-xl-9 col-lg-8 col-md-12">
    <form action="/reviews">
        <div class="card ctm-border-radius shadow-sm grow">
            <div class="card-header">
                <h4 class="card-title mb-0 d-inline-block">Setup</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 form-group">
                        <input type="text" class="form-control" placeholder="Review Name">
                    </div>
                    <div class="col form-group">
                        <input type="text" class="form-control datetimepicker" placeholder="Review Begins On">
                    </div>
                    <div class="col form-group">
                        <input type="text" class="form-control datetimepicker" placeholder="Reviews Completion Date">
                    </div>
                    <div class="col-md-12 form-group mb-0">
                        <select class="form-control select">
                            <option selected>Review Frequency </option>
                            <option value="1">Every 3 Months</option>
                            <option value="2">Every 6 Months</option>
                            <option value="3">Every 12 Months</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card ctm-border-radius shadow-sm grow">
            <div class="card-header">
                <h4 class="card-title mb-0 d-inline-block">Participants</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <select class="form-control select">
                            <option selected>Select Reviewed Employees </option>
                            <option value="1">Everyone</option>
                            <option value="2">Maria Cotton</option>
                            <option value="3">Danny Ward</option>
                        </select>
                    </div>
                    <div class="col-md-12 form-group mb-0">
                        <select class="form-control select">
                            <option selected>Select Reviewer </option>
                            <option value="1">Admin</option>
                            <option value="2">Maria Cotton</option>
                            <option value="3">Danny Ward</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card ctm-border-radius shadow-sm grow">
            <div class="card-header">
                <h4 class="card-title mb-0 d-inline-block">Form</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <textarea class="form-control" placeholder="Explain What This Review Is To, How It's Going To Be Run, How Everyone Can Prepare."></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                        <textarea class="form-control" placeholder="Add Questions For The People Being Reviewed."></textarea>
                        <a href="javascript:void(0)" class="text-primary">Add a Question</a><span class="float-right text-danger">Delete</span>
                    </div>
                    <div class="col-md-12 form-group mb-0">
                        <textarea class="form-control" placeholder="Add Questions For Their Reviewers."></textarea>
                        <a href="javascript:void(0)" class="text-primary">Add a Question</a><span class="float-right text-danger">Delete</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row grow">
            <div class="col-12">
                <div class="submit-section text-center btn-add">
                    <a href="/"><button class="btn btn-theme button-1 ctm-border-radius text-white">Save</button></a>
                    <a href="/reviews" class="btn btn-danger text-white ctm-border-radius "><span></span>Cancle</a>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="sidebar-overlay" id="sidebar_overlay"></div>
<?php include "layouts/footer.php"; ?>