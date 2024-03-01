<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo $_POST['uid'] . "<br>";
    echo $_POST['leave_type'] . "<br>";
    echo $_POST['start_date'] . "start date" . "<br>";
    echo $_POST['end_date'] . "<br>";
}
