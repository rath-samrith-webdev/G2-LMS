<?php
echo "Hello";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $manager_id = $_POST['manager'];
    $deparment_id = $_POST['departmentName'];
    echo "<br>" . $manager_id;
    echo "<br>" . $deparment_id;
}
