<?php 
    $id = $_GET['id'];
    $brand = $_GET['brand'];
    $name = $_GET['name'];
    $price = $_GET['price'];
    $description = $_GET['description'];

    include '../connect_db.php';

    $sql = 'UPDATE items SET `brand` = "'.$brand.'", `name` = "'.$name.'", `price` = "'.$price.'", `description` = "'.$description.'" WHERE id="'.$id.'"';
    $result = mysqli_query($link, $sql);

    if ($result) header('Location: itemView.php?id='.$id);
?>