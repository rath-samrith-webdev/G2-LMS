<?php
require '../../database/database.php';
require "../../models/leave_request.model.php";
if (isset($_SESSION['user']['uid']) and isset($_SESSION['user']['first_name'])) { //Check if the user is a normal user
    if (isset($_POST['view'])) {
        global $connection;
        $uid = $_SESSION['user']['uid'];
        if ($_POST["view"] != '') {
            $update_query = $connection->prepare("UPDATE leave_requests SET seen_status=0 WHERE uid=" . $uid . " AND seen_status=1 ");
            $update_query->execute();
        }
        $query =  $connection->prepare("SELECT * FROM leave_requests INNER JOIN persons ON persons.id == leave_requests.employee_id INNER JOIN leave_types ON leave_requests.leave_type_id=leave_types.id ORDER BY leave_requests.id DESC LIMIT 5");
        $result = $query->execute();
        $output = '';
        if ($result) {
            foreach ($query->fetchAll() as $row) {
                $output .= '
            <li class="notice-board">
            <div class="table-img">
              <div class="e-avatar mr-3"><img class="img-fluid" src="' . $row['profile'] . '" alt="' . $row['first_name'] . 'Danny Ward"></div>
            </div>
            <div class="notice-body">
              <h6 class="mb-0">' . $row['first_name'] . ' has requested for ' . $row['leaveType_desc'] . ' .</h6>
              <span class="ctm-text-sm">' . $row['first_name'] . " " . $row['last_name'] . ' | <b>' . hm_time_ago($row['created_at']) . '</b></span>
            </div>
          </li>
   ';
            }
        } else {
            $output .= '
     <li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
        }

        $status_query = $connection->prepare("SELECT * FROM leave_requests INNER JOIN persons ON persons.id == leave_requests.employee_id INNER JOIN leave_types ON leave_requests.leave_type_id=leave_types.id WHERE leave_requests.employee_id = :user_id ORDER BY leave_requests.id DESC LIMIT 5");
        $result_query = $status_query->execute([
            ':user_id' => $uid
        ]);
        $count = count($status_query->fetchAll());
        $data = array(
            'notification' => $output,
            'unseen_notification'  => $count
        );

        echo json_encode($data);
    }
} else {
    if (isset($_POST['view'])) {
        if ($_POST["view"] != '') {
            $update_query = $connection->prepare("UPDATE leave_requests SET seen_status=0 WHERE uid=" . $uid . " AND seen_status=1 ");
            $update_query->execute();
        }
        $query = $connection->prepare("SELECT * FROM leave_requests INNER JOIN persons ON persons.id == leave_requests.employee_id INNER JOIN leave_types ON leave_requests.leave_type_id=leave_types.id ORDER BY leave_requests.id DESC LIMIT 5");
        $result = $query->execute();
        $output = '';
        if ($result) {
            foreach ($query->fetchAll() as $row) {
                $output .= '
                    <li class="notice-board">
                    <div class="table-img">
                      <div class="e-avatar mr-3"><img class="img-fluid" src="' . $row['profile_img'] . '" alt="' . $row['first_name'] . 'Danny Ward"></div>
                    </div>
                    <div class="notice-body">
                      <h6 class="mb-0">' . $row['first_name'] . ' has requested for ' . $row['name'] . ' .</h6>
                      <span class="ctm-text-sm">' . $row['first_name'] . " " . $row['last_name'] . ' | <b>' . hm_time_ago($row['created_at']) . '</b></span>
                    </div>
                  </li>';
            }
        } else {
            $output .= '
             <li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
        }



        $status_query = $connection->prepare("SELECT * FROM leave_requests INNER JOIN persons ON persons.id == leave_requests.employee_id INNER JOIN leave_types ON leave_requests.leave_type_id=leave_types.id ORDER BY leave_requests.id DESC LIMIT 5");
        $result_query = $status_query->execute();
        $count = count($status_query->fetchAll());
        $data = array(
            'notification' => $output,
            'unseen_notification'  => $count
        );

        echo json_encode($data);
    }
}
