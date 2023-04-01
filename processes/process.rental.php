<?php
//Include rental Class File
include '../classes/rentClass.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        create_new_rental();
	break;
    case 'update':
        update_rental();
	break;
    case 'deactivate':
        deactivate_rental();
	break;
}

//function that creates a new rental
function create_new_rental(){
	$rentals = new Rental();
    $item_name = ucwords($_POST['Item_name']);
    $rent_price = $_POST['rent_price'];
    $item_qty = ($_POST['item_qty']);
   
    $result = $rentals->new_rental($item_name,$rent_price,$item_qty);
    if($result){
        $id = $rentals->get_rental_id($id);
        header('location: ../index.php?page=rentals');
    }
}

//function that creates a updates a rental
function update_rental(){
	$rentals = new Rental();
    $rental_id = $_POST['id'];
    $item_name = $_POST['Item_name'];
	$rent_price = $_POST['rent_price'];
	$item_qty = $_POST['item_qty'];
    
    $result = $rentals->update_rental($item_name,$rent_price,$item_qty, $rental_id);
    if($result){
        header('location: ../index.php?page=rentals');
    }
}

