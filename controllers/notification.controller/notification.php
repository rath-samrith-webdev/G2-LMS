<?php
session_start();
require "../../models/leave_request.model.php";
if (isset($_SESSION['user']['uid'])) {
    if (isset($_POST['view'])) {
        $con = mysqli_connect("localhost", "root", "", "leave_manage_db");
        $uid = $_SESSION['user']['uid'];
        $role_id = $_SESSION['user']['role_id'];
        $dept_id = $_SESSION['user']['department_id'];
        if ($role_id == 1) {
            $query = "SELECT * FROM (((leave_requests INNER JOIN users ON leave_requests.uid=users.uid)INNER JOIN leave_status ON leave_requests.status_id=leave_status.status_id)INNER JOIN leave_types ON leave_requests.leavetype_id=leave_types.leaveType_id) WHERE department_id=" . $dept_id . " ORDER BY request_id DESC LIMIT 5";
        } else {
            $query = "SELECT * FROM total_requests WHERE uid=" . $uid . " ORDER BY request_id DESC LIMIT 5";
        }
        $result = mysqli_query($con, $query);
        $output = '';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if ($row['uid'] == $uid) {
                    $name = "You";
                    $output .= '
                <div class="notice-board">
                <div class="table-img">
                  <div class="e-avatar mr-3"><img class="img-fluid" src="' . $row['profile'] . '" alt="' . $row['first_name'] . '"></div>
                </div>
                <div class="notice-body">
                  <h6 class="mb-0">' . $name . ' have requested for ' . $row['leaveType_desc'] . ' .</h6>
                  <span class="ctm-text-sm">' . $row['first_name'] . " " . $row['last_name'] . ' | <b>' . hm_time_ago($row['added_times']) . '</b></span>
                </div>
              </div>
              <hr>';
                } else {
                    $output .= '
                <div class="notice-board">
                <div class="table-img">
                  <div class="e-avatar mr-3"><img class="img-fluid" src="' . $row['profile'] . '" alt="' . $row['first_name'] . 'Danny Ward"></div>
                </div>
                <div class="notice-body">
                  <h6 class="mb-0">' . $row['first_name'] . ' has requested for ' . $row['leaveType_desc'] . ' .</h6>
                  <span class="ctm-text-sm">' . $row['first_name'] . " " . $row['last_name'] . ' | <b>' . hm_time_ago($row['added_times']) . '</b></span>
                </div>
              </div>
              <hr>';
                }
            }
        } else {
            $output .= '
      <div class="notice-board">
      <div class="notice-body">
        <h6 class="mb-0">There is no action as of yet</h6>
      </div>
    </div>
    <hr>';
        }
        $status_query = "SELECT * FROM total_requests WHERE status_desc='Pending'";
        $result_query = mysqli_query($con, $status_query);
        $count = mysqli_num_rows($result_query);
        $data = array(
            'notification' => $output,
        );

        echo json_encode($data);
    }
} else {
    if (isset($_POST['view'])) {

        $con = mysqli_connect("localhost", "root", "", "leave_manage_db");

        $query = "SELECT * FROM total_requests ORDER BY request_id DESC LIMIT 5";
        $result = mysqli_query($con, $query);
        $output = '';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $output .= '
                <div class="notice-board">
                <div class="table-img">
                  <div class="e-avatar mr-3"><img class="img-fluid" src="' . $row['profile'] . '" alt="' . $row['first_name'] . 'Danny Ward"></div>
                </div>
                <div class="notice-body">
                  <h6 class="mb-0">' . $row['first_name'] . ' has requested for ' . $row['leaveType_desc'] . ' .</h6>
                  <span class="ctm-text-sm">' . $row['first_name'] . " " . $row['last_name'] . ' | <b>' . hm_time_ago($row['added_times']) . '</b></span>
                </div>
              </div>
              <hr>
       ';
            }
        } else {
            $output .= '
         <li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
        }



        $status_query = "SELECT * FROM total_requests WHERE status_desc='Pending'";
        $result_query = mysqli_query($con, $status_query);
        $count = mysqli_num_rows($result_query);
        $data = array(
            'notification' => $output
        );

        echo json_encode($data);
    }
}
