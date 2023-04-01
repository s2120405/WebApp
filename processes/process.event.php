
<?php

//Include event Class File
include '../classes/eventClass.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        create_new_event();
	break;
    case 'newtype':
        create_new_type();
	break;
    case 'updatetype':
        update_type();
	break;
    case 'update':
        update_event();
	break;
    case 'deactivate':
        deactivate_event();
	break;
}

//function that creates a new event
function create_new_event(){
	$events = new Event();
    $place = ucwords($_POST['Venue']);
    $event_start = ($_POST['Event_start']);
    $event_end = ($_POST['Event_end']);
    $event_date = $_POST['Event_date'];
    $type= $_POST['ptype'];
    $result = $events->new_event($place,$event_start,$event_end,$event_date, $type);
    if($result){
        $id = $events->get_event_id($id);
        header('location: ../index.php?page=event');
    }
}

//function that creates a new event type
function create_new_type(){
	$events = new Event();
    $tname= ucwords($_POST['type_name']);    
    $tdesc= ucwords($_POST['type_desc']);    
    $tid = $events->new_Event_type($tname, $tdesc);
    if(is_numeric($tid)){
        header('location: ../index.php?page=event&subpage=readt');
    }
}

//function that creates a updates event type
function update_type(){
	$events = new Event();
    $etype = $_POST['id'];
    $tname= ucwords($_POST['type_name']);    
    $tdesc= ucwords($_POST['type_desc']);    
    $result = $events->update_type($tname,$tdesc, $etype );
    if($result){
        header('location: ../index.php?page=event&subpage=readt');
    }
}

//function that updates an event type
function update_event(){
	$events = new Event();
    $rental_id = $_POST['id'];
	$place=$_POST['Venue'];
	$event_start=$_POST['Event_start'];
	$event_end=$_POST['Event_end'];
    $event_date=$_POST['Event_date'];
    $type= $_POST['ptype'];
    $result = $events->update_event($place,$event_start,$event_end,$event_date, $rental_id, $type);
    if($result){
        header('location: ../index.php?page=event');
    }
}

