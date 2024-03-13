<?php
echo "HI";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $manage_id = $_POST['manager'];
    echo "<br>" . $manage_id;
}
