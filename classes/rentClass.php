<?php
//makes a connection the the database - Rental Class
class Rental{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='test3';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	//function that creates a new rental item
	public function new_rental($item_name,$rent_price, $item_qty){
		

		$data = [
			[$item_name,$rent_price,$item_qty],
		];
		$stmt = $this->conn->prepare("INSERT INTO rentals (item_name, rent_price, item_qty) VALUES (?,?,?)");
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

	//function that updates a rental item
	public function update_rental($item_name,$rent_price,$item_qty, $id){
		

		$sql = "UPDATE rentals SET Item_name=:Item_name, rent_price=:rent_price,item_qty=:item_qty WHERE rental_id=:rental_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':Item_name'=>$item_name,':rent_price'=>$rent_price, ':item_qty'=>$item_qty,':rental_id'=>$id));
		return true;
	}

	//function that lists a the rental items
	public function list_rental(){
			 $sql="SELECT * FROM rentals";
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

	//function that gets the rental item's ID
    function get_Rental_id($id){
		$sql="SELECT rental_id FROM rentals WHERE rental_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rental_id = $q->fetchColumn();
		return $rental_id;
	}

	//function that gets the rental item's name
    function get_Rental_name($id){
		$sql="SELECT item_name FROM rentals WHERE rental_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$item_name = $q->fetchColumn();
		return $item_name;
	}

	//function that gets the rental item's price
    function get_price($id){
		$sql="SELECT rent_price FROM rentals WHERE rental_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rent_price = $q->fetchColumn();
		return $rent_price;
	}

	//function that gets the rental item's quantity
    function get_item_qty($id){
		$sql="SELECT item_qty FROM rentals WHERE rental_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$item_qty = $q->fetchColumn();
		return $item_qty;
	}

	
}
