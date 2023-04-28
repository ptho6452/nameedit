<?php 
require_once '../admin/db.php';
session_start();

// session_destroy();

if(isset($_GET['id'])){
    $id=$_GET['id'];
}

$action=(isset($_GET['action'])) ? $_GET['action'] : 'add';
$quantity= (isset($_GET['quantity'])) ? $_GET['quantity'] : 1;
if($quantity <=0){
    $quantity =1;
}




$query= mysqli_query($mysqli,"SELECT * FROM categories inner join clothes on clothes.id_categories=categories.id_categories WHERE id_clothes=$id");
if($query){
$clothes = mysqli_fetch_assoc($query);
}

$item = [
    'id' => $clothes['id_clothes'],
    'name' => $clothes['name_clothes'],
    'image' => $clothes['image'],
    'rent_prices' => $clothes['rent_prices'],
    'tiencoc' => $clothes['tiencoc'],
    'quantity'=> $quantity
];
if($action =='add'){
    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['quantity']+= $quantity;
    }
    else{
        $_SESSION['cart'][$id]= $item;
    
    }
    header('location: viewcard.php');
} else if($action=='update'){
    $_SESSION['cart'][$id]['quantity'] = $quantity;
    return true;
} else if (($action=='delete')) {
    unset($_SESSION['cart'][$id]);
    header('location: viewcard.php');    
}
return false;



?>