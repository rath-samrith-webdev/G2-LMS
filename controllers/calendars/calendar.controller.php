<?php
require "database/database.php";
require "models/leave_request.model.php";
$leaverequest = getALlleaves();
require "views/calendars/calendar.view.php";
