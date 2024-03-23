
<?php
include "layouts/header.php";
include "layouts/navbar.php";
?>
<div class="col-xl-9 col-lg-8  col-md-12">
	<div class="modal fade" id="add_leave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Create admin login</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="controllers/admin/create_admin_controller.php" method="post">
						<div class="row">
                            <div class="col form-group">
                                <input type="text" class="form-control" placeholder="First Name" name="fsnameAdmin">
                            </div>
                            <div class="col form-group">
                                <input type="text" class="form-control" placeholder="Last Name" name="lsnameAdmin">
                            </div>
                            <div class="col-12 form-group">
                                <input type="email" class="form-control" placeholder="Email" name="emailAdmin">
                            </div>
                            <div class="col-12 form-group">
                                <?php if(isset($_GET['error'])) {?>
                                    <p class="alert alert-danger text-danger" role="alert"><?= $_GET['error'];?></p>
                                <?php } ?>
                                <input type="password" class="form-control" placeholder="Password" name="passwordAdmin" minlength="8">
                            </div>
                            <div class="col-md-12 form-group">
                                <input class="form-control" type="text" placeholder="Phone Number" name="phoneAdmin">
                            </div>                            
                        </div>
							<div class="text-center">
								<button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4">Add</button>
								<a href="/Add_admin" class="btn btn-danger text-white ctm-border-radius mt-4">Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="card shadow-sm grow ctm-border-radius">
			<div class="card-body align-center">
				<ul class="nav flex-row nav-pills d-flex justify-content-between" id="pills-tab" role="tablist">
					<li class="nav-item mr-2">
						<a class="nav-link active mb-2" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">All admin</a>
					</li>		
					<div class="nav-item mr-2">
						<button class="btn btn-outline-primary addleave">Create Admin</button>
					</div>
				</ul>
			</div>
		</div>
	<div class="card shadow-sm grow ctm-border-radius">
		<div class="card-body align-center">
			<div class="tab-content" id="pills-tabContent">

				<!-- Tab 1-->
				<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					<div class="employee-office-table">
						<div class="table-responsive">
							<table class="table custom-table mb-0">
								<thead>
									<tr>
										<th>Admin Name</th>
										<th>Phone number</th>
										<th>Email</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($Admin as $data){ ?> 
									<tr>
										<td>
											<a href="/prpfileAdmin?id=<?php echo $data['admin_id'] ?>" class="avatar"><img class="img-fluid" alt="avatar image" src="<?= $data['admin_profile'] ?>"></a>
											<h2><a href="employment.html"> <?= $data['first_name'] . ' ' . $data['last_name'] ?></a></h2>
										</td>
										<td>
											<h2><?= $data['phone_number']?></h2>
										</td>
										<td>
											<h2><?= $data['admin_email']?></h2>
										</td>
									</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!--/Tab 1 -->

			</div>
		</div>
	</div>

</div>
</div>
</div>
</div>
<!--/Content-->

</div>
<!-- Inner Wrapper -->

<div class="sidebar-overlay" id="sidebar_overlay"></div>
<?php include "layouts/footer.php"; ?>

