<?php
session_start();
require '../../database/database.php';
require "../../models/leave_request.model.php";
if (isset($_SESSION['user']['id'])) {
    if (isset($_POST['view'])) {
        global $connection;
        $uid = $_SESSION['user']['id'];
        $adminExist = $_SESSION['user']['role_name'] === 'Administrator';
        if ($_POST["view"] != '') {
            $update_query = $connection->prepare("UPDATE notifications SET is_seen=1 WHERE receiver_id=:uid AND is_seen=0 ");
            $update_query->execute([
                ':uid' => $uid
            ]);
        }
        $query = "SELECT * FROM notifications 
                  INNER JOIN leave_requests ON notifications.leave_request_id=leave_requests.id 
                  INNER JOIN persons ON persons.id == leave_requests.employee_id 
                  INNER JOIN leave_types ON leave_requests.leave_type_id=leave_types.id 
                  WHERE notifications.is_seen=0";
        $query .= $adminExist ? " ORDER BY leave_requests.id DESC LIMIT 5" : " AND receiver_id=:user_id ORDER BY leave_requests.id DESC LIMIT 5";
        $executableQuery = $connection->prepare($query);
        $result = $executableQuery->execute(!$adminExist ? [
            ':user_id' => $uid
        ] : null);
        $output = '';
        $data = $executableQuery->fetchAll();
        if ($result) {
            foreach ($data as $row) {
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
        }
        $count = count($data);
        if ($count === 0) {
            $output .= '
            <li class="notice-board"><a href="#" class="text-bold text-italic">There is no notifications as of now</a></li>';
        }
        $data = array(
            'notification' => $output,
            'unseen_notification'  => $count
        );
        echo json_encode($data);
        exit();
    }
}
