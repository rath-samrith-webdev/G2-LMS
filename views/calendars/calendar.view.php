<?php
//Profile image management.
if (isset($_SESSION['user'])) {
	$userExist = true; //if the normal user has logged in 
	if (isset($_SESSION['user']['profile'])) {
		$img = $_SESSION['user']['profile'];
		$username = $_SESSION['user']['first_name'];
		$uid = $_SESSION['user']['uid']; //if the user already had a profile img
	} else {
		if (isset($_SESSION['user']['admin_username'])) { //if that user is an admin user
			$img = "assets/profile/img-2.jpg";
			$adminExist = true;
			$userExist = false;
			$username = "Admin";
		}
	}
}
require "layouts/header.php";
require "layouts/navbar.php"; ?>
<div class="col-xl-9 col-lg-8 col-md-12">
	<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm grow bg-white card">
		<div class="card-body">
			<ul class="list-group list-group-horizontal-lg d-flex justify-content-between">
				<a href="javascript:void(0)" data-toggle="modal" data-target="#add_new_event" class="list-group btn mb-3 btn-theme text-white ctm-border-radius btn-block">
					<i class="fa fa-plus"></i> Add Category </a></li>
			</ul>
		</div>
	</div>
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
<div id="add_event" class="modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Event</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label>Event Name <span class="text-danger">*</span></label>
						<input class="form-control" type="text">
					</div>
					<div class="form-group">
						<label>Event Date <span class="text-danger">*</span></label>
						<div class="cal-icon">
							<input class="form-control datetimepicker" type="text">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Category</label>
						<select class="form-control select" name="category">
							<option value="bg-danger">Danger</option>
							<option value="bg-success">Success</option>
							<option value="bg-purple">Purple</option>
							<option value="bg-primary">Primary</option>
							<option value="bg-info">Info</option>
							<option value="bg-warning">Warning</option>
						</select>
					</div>
					<div class="submit-section text-center">
						<button class="btn btn-theme ctm-border-radius text-white submit-btn button-1">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php if ($userExist and !$adminExist) { { ?>
		<div class="modal fade none-border" id="my_event" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Request Leave</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body"></div>
				</div>
			</div>
		</div>
<?php	}
} ?>
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
			var $this = this;
			var form = $("<form></form>");
			form.append("<label>Change event name</label>");
			form.append(
				"<div class='input-group'><input class='form-control' type=text value='" +
				calEvent.title +
				"' /><span class='input-group-append'><button type='submit' class='btn btn-success'><i class='fa fa-check'></i> Save</button></span></div>"
			);
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
			form
				.find(".row1 ")
				.append(
					"<div class='col-sm-6 leave_type'></div>"
				)
				.append("<div class='col-sm-6 leave-col'><div class='form-group'><label>Remaining Leaves</label><input type=text' class='form-control' placeholder='10' disabled></div></div>")

				.find(".leave_type")
				.append(
					"<div class='form-group type'></div>"
				)
				.find(".type")
				.append("<label>Leave Type <span class = 'text-danger'>*</span></label>")
				.append("<select class='form-control select' name='leave_type'>")
				.find(".select")
			<?php foreach ($leaveTypes as $type) { ?>
					.append("<option value='<?= $type['leaveType_id'] ?>'><?= $type['leaveType_desc'] ?></option>")
			<?php } ?>
			form
				.find(".row2")
				.append("<div class='col-sm-6'><div class='form-group'><label>From</label><input type='text' name='start_date' class='form-control datetimepicker'></div></div>")
				.append("<div class='col-sm-6'><div class='form-group'><label>To</label><input type='text' name='end_date' class='form-control datetimepicker'> </div></div>")
			form
				.find(".row3")
				.append("<div class='col-sm-12 leave-col'><divclass='form-group'><label>Number of Days Leave</label><input type='text' class='form-control' placeholder='2' disabled></div></div>")
			form
				.find(".row4")
				.append("<div class='col-sm-12'><div class='form-group mb-0'><label>Reason</label><textarea class='form-control' rows=4></textarea></div></div>")
			form.append("<button type='submit' class='btn btn-primary mt-5'>Create</button>")
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
			$this.$modal.find("form").on("submit", function() {
				var beginning = form.find("input[name='start_date']").val();
				var ending = form.find("input[name='end_date']").val();
				var categoryClass = form
					.find("select[name='leave_type'] option:checked")
					.val();
				if (title !== null && title.length != 0) {
					$this.$calendarObj.fullCalendar(
						"renderEvent", {
							title: title,
							start: start,
							end: end,
							allDay: false,
							className: categoryClass,
						},
						true
					);
					$this.$modal.modal("hide");
				} else {
					alert("You have to give a title to your event");
				}
				return false;
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
				<?php foreach ($leaverequest as $request) { ?> { //show events on calendar
						title: "<?= $request['first_name'] . '|' . $request['leaveType_desc'] ?>",
						start: "<?= $request['start_date'] ?>",
						className: "bg-warning",
					},
				<?php } ?>
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