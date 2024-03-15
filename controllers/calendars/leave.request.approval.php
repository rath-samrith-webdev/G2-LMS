<?php
echo "HI";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['request_id']) && isset($_POST['request_act'])) {
        echo $_POST['request_id'] . "<br>";
        echo $_POST['request_act'];
    }else{
        header("location: /calendars?=error=act0");
    }
}
