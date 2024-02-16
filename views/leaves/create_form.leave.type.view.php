<?php
require "layouts/header.php";
require 'layouts/navbar.php';
?>
<!-- Main Wrapper -->
<div class="col-xl-9 col-lg-8 col-md-12">

    <div class="row">
        <div class="col-md-12">
            <div class="card ctm-border-radius shadow-sm grow">
                <div class="card-header">
                    <h4 class="card-title mb-0">Apply Leave types</h4>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-12 leave-col">
                            <div class="form-group">
                                <label>Type Name</label>
                                <input type="text" class="form-control" placeholder="Enter you type name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-0">
                                <label>Description</label>
                                <textarea class="form-control" rows=4></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-center">
                    <a href="javascript:void(0);" class="btn btn-theme button-1 text-white ctm-border-radius mt-4">Apply</a>
                    <a href="javascript:void(0);" class="btn btn-danger text-white ctm-border-radius mt-4">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "layouts/footer.php"; ?>