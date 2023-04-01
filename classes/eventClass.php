
<?php
//makes a connection the the database - Event Class
class Event{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='test3';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}

	//function that creates a new event type
	public function new_Event_type($tname,$tdesc){
		
		$data = [
			[$tname,$tdesc],
		];
		$stmt = $this->conn->prepare("INSERT INTO eventtype (type_name, type_desc) VALUES (?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
			
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
	
		return $id;
		}

		//function that updates an event type
		public function update_type($tname,$tdesc, $etype){
		

			$sql = "UPDATE eventtype SET type_name=:type_name,type_desc=:type_desc WHERE type_id=:type_id";
	
			$q = $this->conn->prepare($sql);
			$q->execute(array(':type_name'=>$tname, ':type_desc'=>$tdesc,':type_id'=>$etype));
			return true;
		}
	
	
	// function that creates events
	public function new_event($place, $event_start, $event_end, $event_date, $type){
		

		$data = [
			[$place,$event_start, $event_end, $event_date, $type],
		];
		$stmt = $this->conn->prepare("INSERT INTO events (Venue, Event_start, Event_end, Event_date, type_id) VALUES (?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}

		return true;

	}


	// function that updates event
	public function update_event($place,$event_start, $event_end, $event_date, $id, $etype){
		

		$sql = "UPDATE events SET Venue=:Venue,Event_start=:Event_start, Event_end=:Event_end, Event_date=:Event_date, type_id=:type_id WHERE event_id=:event_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':Venue'=>$place, ':Event_start'=>$event_start,':Event_end'=>$event_end,':Event_date'=>$event_date,':type_id'=>$etype,':event_id'=>$id));
		return true;
	}

	// function that lists the event type
	public function list_event_type(){
		$sql="SELECT * FROM eventtype";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}


	// function that lists the events in the Events page
	public function list_events(){
			 $sql="SELECT * FROM events";
			 $q = $this->conn->query($sql) or die("failed!");
			 while($r = $q->fetch(PDO::FETCH_ASSOC)){
			 $data[]=$r;
			 }
			 if(empty($data)){
				return false;
			 }else{
			 	return $data;	
			 }
	}


	// function that gets the event id
    function get_Event_id($id){
		$sql="SELECT event_id FROM events WHERE event_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$event_id = $q->fetchColumn();
		return $event_id;
	}

	// function that gets the venue
    function get_Venue($id){
		$sql="SELECT Venue FROM events WHERE event_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$place = $q->fetchColumn();
		return $place;
	}

	// function that gets the start of the event
    function get_Event_start($id){
		$sql="SELECT Event_start FROM events WHERE event_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$event_start = $q->fetchColumn();
		return $event_start;
	}

	// function that gets the end of the event
	function get_Event_end($id){
		$sql="SELECT Event_end FROM events WHERE event_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$event_end = $q->fetchColumn();
		return $event_end;
	}

	// function that gets the date of the event
	function get_Event_date($id){
		$sql="SELECT Event_date FROM events WHERE event_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$event_date = $q->fetchColumn();
		return $event_date;
	}

	// function that gets the type of the event
	function get_Events_type($id){
		$sql="SELECT type_id FROM events WHERE event_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_id = $q->fetchColumn();
		return $type_id;
	}

	// function that gets the name of the event type
	function get_Event_type_name($id){
		$sql="SELECT type_name FROM eventtype WHERE type_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_name = $q->fetchColumn();
		return $type_name;
	}

	// function that gets the description of the event type
	function get_Event_type_desc($id){
		$sql="SELECT type_desc FROM eventtype WHERE type_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_desc = $q->fetchColumn();
		return $type_desc;
	}
	
}
