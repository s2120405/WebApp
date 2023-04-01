<?php

//Include rental Class File
include '../classes/transacClass.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        create_new_transac();
	break;
    case 'update':
        update_transac();
	break;
    case 'deactivate':
        deactivate_transac();
	break;
}

//function that creates a new transactions
function create_new_transac(){
	$transacs = new Transac();
    $cust_name = $_POST['cust_name'];
    $cust_no = $_POST['cust_no'];
    $item = ($_POST['item_name']);
    $cust_qty = ($_POST['cust_qty']);
    $result = $transacs->new_transac($cust_name,$cust_no,$item, $cust_qty);
    if($result){
        $id = $transacs->get_Transac_id($id);
        header('location: ../index.php?page=transac');
    }
}

//function that updates a transaction
function update_transac(){
	$transacs = new Transac();
    $trans_id = $_POST['id'];
    $cust_name = $_POST['cust_name'];
	$cust_no = $_POST['cust_no'];
    $item = ($_POST['itemname']);
    $cust_qty = ($_POST['cust_qty']);
    $result = $transacs->update_transac($cust_name,$cust_no, $item, $cust_qty, $trans_id,);
    if($result){


        header('location: ../index.php?page=transac');
    }
}
