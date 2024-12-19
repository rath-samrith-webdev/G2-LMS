<?php
require '../../database/database.php';
require "../../models/leave_request.model.php";
if (isset($_SESSION['user']['uid'])) {
  global $connection;
  if (isset($_POST['view'])) {
    $uid = $_SESSION['user']['uid'];
    $role_id = $_SESSION['user']['role_name'];
    $dept_id = $_SESSION['user']['department_id'];
    if ($role_id == 'Administrator') {
      $query = $connection->prepare("SELECT 
leave_requests.* FROM notifications INNER JOIN leave_requests ON leave_requests.id = notifications.leave_request_id INNER JOIN persons ON persons.id == leave_requests.employee_id INNER JOIN leave_types ON leave_types.id = leave_requests.leave_type_id ORDER BY id DESC LIMIT 5");
    } else {
      $query = $connection->prepare("SELECT leave_requests.*,first_name,last_name,name FROM notifications INNER JOIN leave_requests ON leave_requests.id=notifications.leave_request_id INNER JOIN persons ON persons.id == leave_requests.employee_id WHERE employee_id=:uid ORDER BY id DESC LIMIT 5");
    }
    $result = $query->execute(
      [
        ':uid' => $uid
      ]
    );
    $output = '';
    if ($result) {
      while ($row = $query->fetchAll()) {
        if ($row['uid'] == $uid) {
          $name = "You";
          $output .= '
                <div class="notice-board">
                <div class="table-img">
                  <div class="e-avatar mr-3"><img class="img-fluid" src="' . $row['profile'] . '" alt="' . $row['first_name'] . '"></div>
                </div>
                <div class="notice-body">
                  <h6 class="mb-0">' . $name . ' have requested for ' . $row['leaveType_desc'] . ' .</h6>
                  <span class="ctm-text-sm">' . $row['first_name'] . " " . $row['last_name'] . ' | <b> 30 m </b></span>
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
    $status_query = $connection->prepare("SELECT * FROM leave_requests WHERE status='Pending'");
    $result_query = $status_query->execute();
    $count = count($status_query->fetchAll());
    $data = array(
      'notification' => $output,
    );

    echo json_encode($data);
  }
} else {
  if (isset($_POST['view'])) {
    $query = $connection->prepare("SELECT * FROM leave_requests INNER JOIN persons ON persons.id == leave_requests.employee_id INNER JOIN leave_types ON leave_requests.leave_type_id=leave_types.id ORDER BY leave_requests.id DESC LIMIT 5");
    $result = $query->execute();
    $output = '';
    if ($result) {
      foreach ($query->fetchAll() as $notif) {
        $output .= '
                <div class="notice-board">
                <div class="table-img">
                  <div class="e-avatar mr-3"><img class="img-fluid" src="' . $notif['profile_img'] . '" alt="' . $notif['first_name'] . 'Danny Ward"></div>
                </div>
                <div class="notice-body">
                  <h6 class="mb-0">' . $notif['first_name'] . ' has requested for ' . $notif['name'] . ' .</h6>
                  <span class="ctm-text-sm">' . $notif['first_name'] . " " . $notif['last_name'] . ' | <b>' . hm_time_ago($notif['created_at']) . '</b></span>
                </div>
              </div>
              <hr>
       ';
      }
    } else {
      $output .= '
         <li><a href="#" class="text-bold text-italic">No Notifications Found</a></li>';
    }

    $status_query = $connection->prepare("SELECT * FROM leave_requests WHERE status='Pending'");
    $result_query = $status_query->execute();
    $count = count($status_query->fetchAll());
    $data = array(
      'notification' => $output
    );

    echo json_encode($data);
  }
}
