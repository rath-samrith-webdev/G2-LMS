<?php
//Profile image management.
if (isset($_SESSION['user'])) {
	if (isset($_SESSION['user']['role_name'])) { //if that user is an admin user
		$adminExist = $_SESSION['user']['role_name'] === 'Administrator';
	}
}
require "layouts/header.php";
require "layouts/navbar.php"; ?>
<div class="col-xl-9 col-lg-8 col-md-12">
	<div class="row">
		<div class="col-md-12">
			<div class="card ctm-border-radius shadow-sm grow">
				<div class="card-header">
					<h4 class="card-title mb-0">Calendar</h4>
				</div>
				<div class="card-body">
					<div id="calendar"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if (!$adminExist) { ?>
	<div class="modal fade none-border" id="my_event" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Leave Request Action</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body"></div>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="modal fade none-border" id="my_event" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Request Details</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body"></div>
			</div>
		</div>
	</div>
<?php } ?>
<?php require "layouts/footer.php" ?>
<script>
	!(function($) {
		"use strict";
		var CalendarApp = function() {
			this.$body = $("body");
			(this.$calendar = $("#calendar")),
			(this.$event = "#calendar-events div.calendar-events"),
			(this.$categoryForm = $("#add_new_event form")),
			(this.$extEvents = $("#calendar-events")),
			(this.$modal = $("#my_event")),
			(this.$saveCategoryBtn = $(".save-category")),
			(this.$calendarObj = null);
		};
		/* on click on event */
		(CalendarApp.prototype.onEventClick = function(calEvent, jsEvent, view) {
			<?php if ($role_id == 'Administrator') { ?>
				if (calEvent.uid == <?php echo json_encode($_SESSION['user']['id']) ?>) {
					$.notify("You cannot approve your own requests", {
							position: "bottom-right"
						},
						"warn");
					return;
				}
				var $this = this;
				var form = $("<form action='controllers/calendars/leave.request.approval.php' method='post'></form>");
				form.append("<input class='form-control' name='uid' type='hidden' value='" + calEvent.uid + "' /><span class='input-group-append'>")
				form.append("<input class='form-control' name='request_id' type='hidden' value='" + calEvent.id + "' /><span class='input-group-append'>")
				form.append("<div class='row'></div>")
				form
					.find(".row")
					.append("<div class='col-sm-12 eventName'></div>")
				form
					.find(".eventName")
					.append("<h4>Title: " + calEvent.title + "</h4>")
				form
					.find(".row")
					.append("<div class='form-group col-sm-12 approve mt-3'></div>")
				form
					.find('.approve')
					.append("<label>Choose actions <span class = 'text-danger'>*</span></label>")
					.append(`<select name='leave_status' class='form-control ap-action'><option hidden>Select an action</option></select>`)
				form
					.find(".ap-action")
					.append("<option value='Approved'>Approve</option><option value='Rejected'>Reject</option>")
				form
					.find(".row")
					.append("<div class='col-sm-12 action'></div>")
				form
					.find(".action")
					.append("<button type='submit' class='btn btn-theme text-white'>Save</button>")
				$this.$modal.modal({
					backdrop: "static",
				});
				$this.$modal
					.find(".delete-event")
					.show()
					.end()
					.find(".save-event")
					.hide()
					.end()
					.find(".modal-body")
					.empty()
					.prepend(form)
					.end()
					.find(".delete-event")
					.unbind("click")
					.click(function() {
						$this.$calendarObj.fullCalendar("removeEvents", function(ev) {
							return ev._id == calEvent._id;
						});
						$this.$modal.modal("hide");
					});
			<?php } else { ?>
				var $this = this;
				var form = $("<div class='col-sm-12'></div>");
				form.append("<div class='row1 row d-flex justify-content-between'></div>");
				form.append("<div class='row2 row d-flex justify-content-between'></div>");
				form.append("<div class='row3 row d-flex justify-content-between'></div>");
				form
					.find(".row1")
					.append("<h5>Leave Title: " + calEvent.title + "</h5>");
				form
					.find(".row1")
					.append("<h5>Approval Status: " + calEvent.status + "</h5>");
				form
					.find(".row2")
					.append("<h5>Start Date: " + calEvent.startDate + "</h5>");
				form
					.find(".row2")
					.append("<h5>End Date: " + calEvent.endDate + "</h5>");
				form
					.find(".row3")
					.append("<h5>Request Date: " + calEvent.requestDate + "</h5>");
				$this.$modal.modal({
					backdrop: "static",
				});
				$this.$modal
					.find(".delete-event")
					.show()
					.end()
					.find(".save-event")
					.hide()
					.end()
					.find(".modal-body")
					.empty()
					.prepend(form)
					.end()
					.find(".delete-event")
					.unbind("click")
					.click(function() {
						$this.$calendarObj.fullCalendar("removeEvents", function(ev) {
							return ev._id == calEvent._id;
						});
						$this.$modal.modal("hide");
					});
				$this.$modal.find("form").on("submit", function() {
					calEvent.title = form.find("input[type=text]").val();
					$this.$calendarObj.fullCalendar("updateEvent", calEvent);
					$this.$modal.modal("hide");
					return false;
				});
			<?php } ?>
		}),
		/* on select */
		(CalendarApp.prototype.onSelect = function(start, end, allDay) {
			var $this = this;
			$this.$modal.modal({
				backdrop: "static",
			});
			var form = $("<form action='controllers/leaves/add.leave.controller.php' method='post'></form>");
			form.append("<div class='row1 row'></div>");
			form.append("<div class='row2 row'></div>");
			form.append("<div class='row3 row'></div>");
			form.append("<div class='row4 row'></div>");
			form.append("<input type='hidden' value='<?= $_SESSION['user']['id'] ?>' name='uid'>")
			form
				.find(".row1 ")
				.append(
					"<div class='col-sm-6 leave_type'></div>"
				)
				.append("<div class='col-sm-6 leave-col'><div class='form-group'><label>Remaining Leaves</label><input type=text' id='remain_leaves' class='form-control' disabled></div></div>")

				.find(".leave_type")
				.append(
					"<div class='form-group type'></div>"
				)
				.find(".type")
				.append("<label>Leave Type <span class = 'text-danger'>*</span></label>")
				.append("<select class='form-control select' id='leave_type' name='leave_type'>")
				.find(".select")
			<?php foreach ($leaveTypes as $type) { ?>
					.append("<option value='<?= $type['id'] ?>'><?= $type['name'] ?></option>")
			<?php } ?>
			form
				.find(".row2")
				.append("<div class='col-sm-6'><div class='form-group'><label>From</label><input class='form-control' name='start_date' type=text value='" +
					start.format() +
					"' /></div></div>")
				.append("<div class='col-sm-6'><div class='form-group'><label>To</label><input class='form-control' name='end_date' type=text value='" +
					end.format() +
					"' /> </div></div>")
			form
				.find(".row3")
				.append("<div class='col-sm-12 leave-col'><divclass='form-group'><label>Number of Days Leave</label><input type='text' class='form-control' placeholder='2' disabled></div></div>")
			form
				.find(".row4")
				.append("<div class='col-sm-12'><div class='form-group mb-0'><label>Reason</label><textarea class='form-control' rows=4></textarea></div></div>")
			form.append(`<button type='submit' class='btn btn-primary mt-5 add_request'>Create</button>`)
			$this.$modal
				.find(".delete-event")
				.hide()
				.end()
				.find(".save-event")
				.show()
				.end()
				.find(".modal-body")
				.empty()
				.prepend(form)
				.end()
				.find(".save-event")
				.unbind("click")
				.click(function() {
					form.submit();
				});
			$this.$modal.find("#leave_type").on("change", function() {
				console.log('changed');
				$.ajax({
					url: "controllers/leaves/leave_allowances.php",
					method: "GET",
					data: {
						type_id: event.target.value
					},
					dataType: "json",
					success: function(data) {
						$("#remain_leaves").val(data.remains)
						$this.$modal.find(".add_request").attr("disabled", data.remains === 0)
					},
				});
			});
			$this.$modal.find("form").on("submit", function() {
				var beginning = form.find("input[name='start_date']").val();
				var ending = form.find("input[name='end_date']").val();
				var categoryClass = form
					.find("select[name='leave_type'] option:checked")
					.val();
			});
			$this.$calendarObj.fullCalendar("unselect");
		}),
		(CalendarApp.prototype.enableDrag = function() {
			//init events
			$(this.$event).each(function() {
				// it doesn't need to have a start or end
				var eventObject = {
					title: $.trim($(this).text()), // use the element's text as the event title
				};
				// store the Event Object in the DOM element so we can get to it later
				$(this).data("eventObject", eventObject);
				// make the event draggable using jQuery UI
				$(this).draggable({
					zIndex: 999,
					revert: true, // will cause the event to go back to its
					revertDuration: 0, //  original position after the drag
				});
			});
		});
		/* Initializing */
		(CalendarApp.prototype.init = function() {
			this.enableDrag();
			/*  Initialize the calendar  */
			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();
			var form = "";
			var today = new Date($.now());

			var defaultEvents = [
				<?php if ($adminExist) {
					foreach ($leaverequest as $request) {
						$bg = "";
						if ($request['status'] === "Approved") {
							$bg = "bg-success";
						} elseif ($request['status'] === "Pending") {
							$bg = "bg-warning";
						} else {
							$bg = "bg-danger";
						}
				?> {
							uid: <?= $request['employee_id']; ?>,
							id: <?= $request['id'] ?>,
							title: "<?= $request['employee_id'] == $_SESSION['user']['id'] ? "Me" . ' | ' . $request['name']  :  $request['first_name'] . ' | ' . $request['name'] ?>",
							start: "<?= $request['start_date'] ?>",
							className: <?= json_encode($bg) ?>,
						},
					<?php }
				} else { ?>
					<?php
					foreach ($leaverequest as $request) {
						$bg = "";
						if ($request['status'] === "Approved") {
							$bg = "bg-success";
						} elseif ($request['status'] === "Pending") {
							$bg = "bg-warning";
						} else {
							$bg = "bg-danger";
						} ?> {
							uid: <?= $request['employee_id']; ?>,
							id: <?= $request['id'] ?>,
							title: "<?= $request['name'] ?>",
							start: "<?= $request['start_date'] ?>",
							startDate: "<?= $request['start_date'] ?>",
							endDate: "<?= $request['end_date'] ?>",
							requestDate: "<?= $request['created_at'] ?>",
							status: "<?= $request['status'] ?>",
							className: <?= json_encode($bg) ?>,
						},
				<?php }
				} ?>
			];

			var $this = this;
			$this.$calendarObj = $this.$calendar.fullCalendar({
				slotDuration: "00:15:00" /* If we want to split day time each 15minutes */ ,
				minTime: "08:00:00",
				maxTime: "19:00:00",
				defaultView: "month",
				handleWindowResize: true,

				header: {
					left: "prev,next today",
					center: "title",
					right: "month,agendaWeek,agendaDay",
				},
				events: defaultEvents,
				editable: true,
				droppable: true, // this allows things to be dropped onto the calendar !!!
				eventLimit: true, // allow "more" link when too many events
				selectable: true,
				drop: function(date) {
					$this.onDrop($(this), date);
				},
				select: function(start, end, allDay) {
					$this.onSelect(start, end, allDay);
				},
				eventClick: function(calEvent, jsEvent, view) {
					$this.onEventClick(calEvent, jsEvent, view);
				},
			});

			//on new event
			this.$saveCategoryBtn.on("click", function() {
				var categoryName = $this.$categoryForm
					.find("input[name='category-name']")
					.val();
				var categoryColor = $this.$categoryForm
					.find("select[name='category-color']")
					.val();
				if (categoryName !== null && categoryName.length != 0) {
					$this.$extEvents.append(
						'<div class="calendar-events" data-class="bg-' +
						categoryColor +
						'" style="position: relative;"><i class="fa fa-circle text-' +
						categoryColor +
						'"></i>' +
						categoryName +
						"</div>"
					);
					$this.enableDrag();
				}
			});
		}),
		//init CalendarApp
		($.CalendarApp = new CalendarApp()),
		($.CalendarApp.Constructor = CalendarApp);
	})(window.jQuery),
	//initializing CalendarApp
	(function($) {
		"use strict";
		$.CalendarApp.init();
	})(window.jQuery);
</script>
<?php
if (isset($_GET['leaveerror']) &&  $_GET['leaveerror'] === 'notvalid') { ?>
	<script>
		$.notify("You've entered the wrong date", {
				position: "top-center"
			},
			"warn");
	</script>
<?php } ?>