<?php
require "../../models/leave_request.model.php";
if (isset($_POST['view'])) {

  $con = mysqli_connect("localhost", "root", "", "leave_manage_db");

  if ($_POST["view"] != '') {
    $update_query = "UPDATE comments SET comment_status = 1 WHERE comment_status=0";
    mysqli_query($con, $update_query);
  }
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
    'notification' => $output,
    'unseen_notification'  => $count
  );

  echo json_encode($data);
}
