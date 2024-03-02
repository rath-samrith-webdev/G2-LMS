<?php
require "../../models/export.model.php";
$output = '';
if (isset($_POST["export"])) {
    $result = getData();
    if (count($result) > 0) {
        $output .= '
   <table class="table" bordered="1">  
                    <tr> 
                        <th>Request ID</th>
                        <th>Name</th>  
                        <th>Leave Type</th>  
                        <th>Start Date</th>  
                        <th>End Date</th>
                        <th>Status</th>
                    </tr>
  ';
        foreach ($result as  $row) {
            $output .= '
                    <tr>      
                        <td>' . $row["request_id"] . '</td>     
                        <td>' . $row["first_name"] . " " . $row['last_name'] . '</td>  
                        <td>' . $row["leaveType_desc"] . '</td>  
                        <td>' . $row["start_date"] . '</td>  
                        <td>' . $row["end_date"] . '</td>  
                        <td>' . $row["status_desc"] . '</td>
                    </tr>
   ';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=download.xls');
        echo $output;
    }
}
