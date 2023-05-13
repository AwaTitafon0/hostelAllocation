<?php

require_once 'config.php';
global $conn;

    $id = $_GET["id"];

    $sql =  "DELETE FROM `student_form` WHERE id = $id";
    $conn->query($sql);

    header("location:details.php");



?>;