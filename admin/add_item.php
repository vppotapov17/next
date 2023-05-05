<?php 
    include '../connect_db.php';

    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // определение id товара
    $id = 1;

    $sql1 = 'SELECT * FROM items WHERE categoryId="'.$category.'"';
    $result1 = mysqli_query($link, $sql1);

    while($row1 = mysqli_fetch_array($result1)){
        $id++;
    }

    $id = $category.$id;

    // определение пути к изображению
    $sectionId = substr($category, 0, -2);
    $section;

    if ($sectionId == 1) $section = 'man';
    else if ($sectionId == 2) $section = 'woman';
    else if ($sectionId == 3) $section = 'girls';
    else if ($sectionId == 4) $section = 'boys';

	$uploaddir = '../img/'.$section.'/items/';
    $uploadfile = $uploaddir . basename($_FILES['itemImage']['name']);
    
   
    if (move_uploaded_file($_FILES['itemImage']['tmp_name'], $uploadfile)) {
        $sql = 'INSERT INTO items(`id`, `brand`, `name`, `price`, `picture`, 
        `description`, `categoryId`) VALUES("'.$id.'", "'.$brand.'", "'.$name.'", "'.$price.'",
         "'.$uploadfile.'", "'.$description.'", "'.$category.'")';
         $result = mysqli_query($link, $sql);
    
         if ($result) header('Location: lk.php');
    }

    
?>