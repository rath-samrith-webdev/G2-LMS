<?php include "layouts/header.php"; ?>
<!--Section: Contact v.2-->
<div>
    <section class="mb-10">
    
        <!--Section heading-->
        <h1 class="h1-responsive font-weight-bold text-center my-4">Send Email</h1>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5 col-md-8">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
            a matter of hours to help you.</p>
    
        <div class="row d-flex justify-content-center">
    
            <!--Grid column-->
            <div class="col-md-8 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="controllers/users/send.message.controller.php" method="POST">
                    <!--Grid row-->
                    <div class="row">
    
                        <!--Grid column-->
                        <div class="col-md-6">
                            <select class="form-control select" name="emailManager">
								<?php foreach ($manager as $result) { ?>
										<option value='<?= $result['manager_id']?>'><?=$result['manager_email']?></option>
								<?php } ?>
							</select>
                            <!-- <div class="md-form mb-0">
                                <input type="email" id="email" name="emailManager" class="form-control" placeholder=" Input email that you to send " ?>
                                <label for="name" class="">Email Name</label>
                            </div> -->
                        </div>
                        <!--Grid column-->
    
                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="email" name="emailUser" class="form-control" placeholder="<?= $_SESSION['user']['email']; ?>" disabled>
                                <label for="email" class="">Your Email</label>
                            </div>
                        </div>
                        <!--Grid column-->
                    </div>    
                    <!--Grid row-->
                    <div class="row">
    
                        <!--Grid column-->
                        <div class="col-md-12">
    
                            <div class="md-form">
                                <textarea type="text" id="message" name="message" rows="4" class="form-control md-textarea"  placeholder=" Types your message this where "></textarea>
                                <label for="message"></label>
                            </div>
    
                        </div>
                    </div>
                    <!--Grid row-->
                    <div class="text-center text-md-left">
                        <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                        <a class="btn btn-primary" href="/reviews">Send</a>
                    </div>
                    <div class="status" ></div>
                </form>
            </div>
    </section>
    <!--Section: Contact v.2-->
</div>
<?php include "layouts/footer.php"; ?>