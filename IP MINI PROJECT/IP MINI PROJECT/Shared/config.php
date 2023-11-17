<?php
//this file inside the shared folder
$conn = new mysqli('localhost', 'root', '', 'ipminiproject');

if ($conn->connect_error) {
    echo "Error in connection";
    die;
}

?>