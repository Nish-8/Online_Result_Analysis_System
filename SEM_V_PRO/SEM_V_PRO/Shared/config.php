<?php
//this file inside the shared folder
$conn = new mysqli('localhost', 'root', '', 'sem_v_pro');

if ($conn->connect_error) {
    echo "Error in connection";
    die;
}

?>