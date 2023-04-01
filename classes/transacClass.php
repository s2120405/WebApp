<?php
//makes a connection the the database - Transac Class
class Transac{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='test3';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	//function that creates a new transaction
	public function new_transac($cust_name, $cust_no, $item, $cust_qty){
		

		$data = [
			[$cust_name,$cust_no, $item, $cust_qty],
		];
		$stmt = $this->conn->prepare("INSERT INTO rental_transac (cust_name, cust_no, rental_id, cust_qty) VALUES (?,?,?,?)");
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

	//function that updates a transaction
	public function update_transac($cust_name,$cust_no,$item, $cust_qty, $Ttype){
		

		$sql = "UPDATE rental_transac SET cust_name=:cust_name, cust_no=:cust_no,cust_qty=:cust_qty, rental_id=:rental_id WHERE trans_id=:trans_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':cust_name'=>$cust_name,':cust_no'=>$cust_no, ':cust_qty'=>$cust_qty,':rental_id'=>$item,':trans_id'=>$Ttype));
		return true;
	}

	//function that lists the transactions
	public function list_transac(){
			 $sql="SELECT * FROM rental_transac";
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

	//function that lists the rental items
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


	//function that gets the transaction ID
	function get_Transac_id($id){
	$sql="SELECT trans_id FROM rental_transac WHERE trans_id = :id";	
	$q = $this->conn->prepare($sql);
	$q->execute(['id' => $id]);
	$trans_id = $q->fetchColumn();
	return $trans_id;
}

	//function that gets the transactions customer name
    function get_Transac_cust($id){
		$sql="SELECT cust_name FROM rental_transac WHERE trans_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_name = $q->fetchColumn();
		return $cust_name;
	}

	//function that gets the transactions customer contact no.
    function get_custno($id){
		$sql="SELECT cust_no FROM rental_transac WHERE trans_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_no = $q->fetchColumn();
		return $cust_no;
	}
/*
	function get_Transac_depo($id){
		$sql="SELECT cash_depo FROM rental_transac WHERE trans_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cash_depo = $q->fetchColumn();
		return $cash_depo;
	} */

	//function that gets the rental item's ID
	function get_rental_items($id){
		$sql="SELECT rental_id FROM rental_transac WHERE trans_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rental_id = $q->fetchColumn();
		return $rental_id;
	}

	//function that gets the rental item's name
	function get_item_name($id){
		$sql="SELECT item_name FROM rentals WHERE rental_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$item_name = $q->fetchColumn();
		return $item_name;
	}

	//function that gets the quantity of the customer's ordered items
	function get_cust_qty($id){
		$sql="SELECT cust_qty FROM rental_transac WHERE trans_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$cust_qty = $q->fetchColumn();
		return $cust_qty;
	}

	//function that gets the rental item's price
	function get_price($id){
		$sql="SELECT rent_price  FROM rentals WHERE rental_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rent_price = $q->fetchColumn();
		return $rent_price;
	}


//function for multiplying the price and the quantity from the rentals table and rental_transac table
function get_multiply($id){
    // Join the rentals and transactions tables on their respective ID fields
    $sql = "SELECT r.rent_price, t.cust_qty
            FROM rentals r
            INNER JOIN rental_transac t ON r.rental_id = t.rental_id
            WHERE t.trans_id = :id";
    $query = $this->conn->prepare($sql);
    $query->execute(['id' => $id]);
    $result = $query->fetch();

 if (!$result) {
        return false; 
    }

    // Multiply the rental price with the value from the transactions table
    $transaction_price = $result['rent_price'] * $result['cust_qty'];

    return $transaction_price;
}

}
