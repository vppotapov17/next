<?php
    $type = $_GET['type'];
    $value = $_GET['value'];

    include "../connect_db.php";
    $sql = 'UPDATE `contact` SET `value` = "'.$value.'" WHERE `name` = "'.$type.'"';
    $result = mysqli_query($link, $sql);

    if ($result) header('Location: about.php');
?>