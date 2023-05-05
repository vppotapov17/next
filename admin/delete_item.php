<?php
    include '../connect_db.php';
    $id = $_GET['id'];

    $sql = 'DELETE FROM items WHERE `id` = '.$id;
    $result = mysqli_query($link, $sql);

    if ($result) header('Location: ../index.php');
?>
