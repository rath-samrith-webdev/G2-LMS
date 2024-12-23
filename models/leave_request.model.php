<?php

// ======== get select data All =========
function getLeaveData(): array
{
    global $connection;
    $statement = $connection->prepare("select * from leave_requests");
    $statement->execute();

    return $statement->fetchAll();
}

// ========= get select All of total requests ======== 
function getALlleaves()
{
    global $connection;
    $statement = $connection->prepare("SELECT leave_requests.*,name,first_name,last_name,profile_img FROM leave_requests INNER JOIN persons ON persons.id == leave_requests.employee_id INNER JOIN leave_types ON leave_types.id = leave_requests.leave_type_id");
    $statement->execute();
    return $statement->fetchAll();
}

// ======= Update data ========
function updateLeaveData(string $status, int $request_id): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE leave_requests SET status =:status_id WHERE id = :request_id");
    $statement->execute([
        ':request_id' => $request_id,
        ':status_id' => $status
    ]);

    return $statement->rowCount() > 0;
}

// ========= Remove All of data ==========
function removeAll(): bool
{
    global $connection;
    $statement = $connection->prepare("delete from leave_requests");
    $statement->execute();
    return $statement->rowCount() == 0;
}

// ======== delete data =========
function deleteLeaveData(int $request_id): bool
{
    global $connection;
    $statement = $connection->prepare("DELETE FROM leave_requests WHERE id = :request_id");
    $statement->execute([':request_id' => $request_id]);
    return $statement->rowCount() > 0;
}

function getALlUserleaves(int $uid)
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM leave_requests INNER JOIN persons ON persons.id == leave_requests.employee_id INNER JOIN leave_types ON leave_types.id = leave_requests.leave_type_id WHERE employee_id =:uid");
    $statement->execute([":uid" => $uid]);
    return $statement->fetchAll();
}
function addLeave($uid, $leaveType, $start_date, $end_date): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO leave_requests (leave_type_id,employee_id,start_date,end_date,status) VALUES (:uid,:leaveType_id,:start_date,:end_date,:status_id)");
    $statement->execute(
        [
            ':uid' => $uid,
            ':leaveType_id' => $leaveType,
            ':start_date' => $start_date,
            ':end_date' => $end_date,
            ':status_id' => "Pending"
        ]
    );
    return $statement->rowCount() > 0;
}
function getleave(int $id, int $uid): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM leave_requests INNER JOIN persons ON persons.id == leave_requests.employee_id INNER JOIN leave_types ON leave_types.id = leave_requests.leave_type_id  WHERE leave_requests.id = :id AND employee_id=:uid LIMIT 1");
    $statement->execute([
        ':id' => $id,
        ':uid' => $uid
    ]);
    return $statement->fetch();
}
// =========Get leave request on specific date======

function allLeavesToday($date)
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM leave_requests WHERE start_date=:date");
    $statement->execute(
        [':date' => $date]
    );

    return $statement->fetchAll();
}
function allLeavesNotify()
{
    global $connection;
    $statement = $connection->prepare("select * from total_requests order by request_id limit 5");
    $statement->execute();

    return $statement->fetchAll();
}
function hm_time_ago($timestamp)
{
    date_default_timezone_set('Asia/Bangkok');
    $time_ago = strtotime($timestamp);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    $minutes      = round($seconds / 60);           // value 60 is seconds  
    $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
    $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
    $weeks          = round($seconds / 604800);          // 7*24*60*60;  
    $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
    $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
    if ($seconds <= 60) {
        return "Just Now";
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "one minute ago";
        } else {
            return "$minutes minutes ago";
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            return "an hour ago";
        } else {
            return "$hours hours ago";
        }
    } else if ($days <= 7) {
        if ($days == 1) {
            return "yesterday";
        } else {
            return "$days days ago";
        }
    } else if ($weeks <= 4.3) //4.3 == 52/12  
    {
        if ($weeks == 1) {
            return "a week ago";
        } else {
            return "$weeks weeks ago";
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            return "a month ago";
        } else {
            return "$months months ago";
        }
    } else {
        if ($years == 1) {
            return "one year ago";
        } else {
            return "$years years ago";
        }
    }
}
//==========get user leaves today
function getuserLeaveToday(int $uid, $date): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM leave_requests INNER JOIN persons ON persons.id = leave_requests.employee_id INNER JOIN leave_types ON leave_types.id = leave_requests.leave_type_id WHERE start_date=:date and employee_id=:uid");
    $statement->execute(
        [
            ':date' => $date,
            ':uid' => $uid
        ]
    );
    return $statement->fetchAll();
}
//==========get  all leave requests of a user=======
function getUserLeavesNotify(int $uid, int $status)
{
    global $connection;
    $statement = $connection->prepare("select * from total_requests where uid=:uid and seen order by request_id limit 5");
    $statement->execute();

    return $statement->fetchAll();
}
function updatePersonalLeave(int $request_id, int $uid): bool
{
    global $connection;
    $statement = $connection->prepare("update leave_requests set status_id =:status_id where request_id = :request_id and uid=:uid");
    $statement->execute([
        ':request_id' => $request_id,
        ':uid' => $uid,
        ':status_id' => 4
    ]);

    return $statement->rowCount() > 0;
}
// Get one requests
function getOneleaves(int $request_id)
{
    global $connection;
    $statement = $connection->prepare("select * from total_requests where request_id=:request_id");
    $statement->execute([":request_id" => $request_id]);

    return $statement->fetch();
}

function getDepartRequest($department_id)
{
    global $connection;
    $statement = $connection->prepare("SELECT leave_requests.*,leave_types.name,first_name,last_name,profile_img FROM leave_requests INNER JOIN persons ON persons.id == leave_requests.employee_id INNER JOIN leave_types ON leave_requests.leave_type_id=leave_types.id INNER JOIN person_details ON person_details.id=persons.person_detail_id INNER JOIN departments ON departments.id = person_details.department_id WHERE departments.manager_id = :user_id ORDER BY leave_requests.id DESC");
    $statement->execute([":user_id" => $department_id]);
    return $statement->fetchAll();
}
function getApproveRequest($department_id)
{
    global $connection;
    $statement = $connection->prepare("SELECT leave_requests.* FROM leave_requests INNER JOIN persons ON persons.id = leave_requests.employee_id INNER JOIN person_details ON person_details.id= persons.person_detail_id INNER JOIN departments ON departments.id = person_details.department_id WHERE departments.manager_id=:dept_id AND status= 'Approved';");
    $statement->execute([":dept_id" => $department_id]);
    if (!$statement) {
        return [];
    } else {
        return $statement->fetchAll();
    }
}
function getPendingRequest($department_id)
{
    global $connection;
    $statement = $connection->prepare("SELECT leave_requests.* FROM leave_requests INNER JOIN persons ON persons.id = leave_requests.employee_id INNER JOIN person_details ON person_details.id= persons.person_detail_id INNER JOIN departments ON departments.id = person_details.department_id WHERE departments.manager_id=:dept_id AND status= 'Pending';");
    $statement->execute([":dept_id" => $department_id]);
    if (!$statement) {
        return [];
    } else {
        return $statement->fetchAll();
    }
}
function getempLeaveToday(int $dept_id, $date): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM leave_requests INNER JOIN persons ON persons.id = leave_requests.employee_id INNER JOIN person_details ON person_details.id =persons.person_detail_id INNER JOIN departments ON departments.id = person_details.department_id WHERE departments.manager_id=:dept_id AND start_date=:date");
    $statement->execute([":dept_id" => $dept_id, ':date' => $date]);
    if (!$statement) {
        return [];
    } else {
        return $statement->fetchAll();
    }
}
function getuserApproveLeave(int $uid): array
{
    global $connection;
    $statement = $connection->prepare("select * from leave_requests where status='Approved' and employee_id=:uid");
    $statement->execute(
        [
            ':uid' => $uid
        ]
    );
    return $statement->fetchAll();
}
function getuserPendingLeave(int $uid): array
{
    global $connection;
    $statement = $connection->prepare("select * from leave_requests where status='Pending' and employee_id=:uid");
    $statement->execute(
        [
            ':uid' => $uid
        ]
    );
    return $statement->fetchAll();
}
function getuserLeaves(int $uid): array
{
    global $connection;
    $statement = $connection->prepare("select * from leave_requests where employee_id=:uid");
    $statement->execute(
        [
            ':uid' => $uid
        ]
    );
    return $statement->fetchAll();
}

function getRequestEachMonth($month, $type = null)
{
    global  $connection;
    $statement = $type ? $connection->prepare("SELECT * FROM leave_requests INNER JOIN leave_types ON leave_types.id=leave_requests.leave_type_id  WHERE strftime('%m', start_date)=:month AND leave_type_id=:type_id ") : $connection->prepare("SELECT * FROM leave_requests INNER JOIN leave_types ON leave_types.id=leave_requests.leave_type_id  WHERE strftime('%m', start_date)=:month");
    $executable = $type ? [':month' => $month, ':type_id' => $type] : [':month' => $month];
    $statement->execute($executable);
    if (!$statement) {
        return [];
    } else {
        return $statement->fetchAll();
    }
}

/**
 * @func getleaverequestsAllowancesByType
 */
function getLeaveAllowanceByType(int $type_id, int $user_id): array
{
    global $connection;
    $statement = $connection->prepare('SELECT used,total,remains FROM leave_allowances WHERE leave_type_id=:id AND belong_to=:user_id LIMIT 1');
    $statement->execute([
        ":id" => $type_id,
        ":user_id" => $user_id
    ]);
    return $statement->fetch();
}
