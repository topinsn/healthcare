<?php 
	include_once("shared/constant.php");

	// class definition

	class Country{

		// member variables
		public $country_id;
		public $country_name;
		public $stateid;
		public $statename;
		public $lgaid;
		public $lganame;
		public $conn; //database connection handler

		//member functions
		public function __construct(){

			// new connection
			$this->conn = new mySQLi(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);

			// check for connection

			if($this->conn->connect_error){
				die("Connection Failed: ".$this->conn->connect_error);
			}
		}
		// start get country method
		public function getCountry(){
		 	$stmt = $this->conn->prepare("SELECT * FROM country");

		 	// execute

		 	$stmt->execute();

		 	// get result

		 	$result = $stmt->get_result();

		 	// fetch result

		 	$record = array();
		 	if ($result->num_rows>0) {
		 		while ($row = $result->fetch_assoc()) {
		 			$record[] = $row;
		 		}
		 	}

		 	return $record;

		 }
		// end get country method 

		// begin get state method
		 public function getStates($countryid){
		 	$stmt = $this->conn->prepare("SELECT * FROM state where country_id=?");

		 	// bind parameter
		 	$stmt->bind_param('i', $countryid);
		 	// execute

		 	$stmt->execute();

		 	// get result

		 	$result = $stmt->get_result();

		 	// fetch result

		 	$record = array();
		 	if ($result->num_rows>0) {
		 		while ($row = $result->fetch_assoc()) {
		 			$record[] = $row;
		 		}
		 	}

		 	return $record;

		 }

		 // begin get lga

		 public function getLGA($stateid){
		 	$stmt = $this->conn->prepare("SELECT * from lga where state_id=?");

		 	// bind parameter

		 	$stmt->bind_param("i", $stateid);

		 	// execute

		 	$stmt->execute();

		 	// get result

		 	$result = $stmt->get_result();

		 	$record=array();
		 	if ($result->num_rows>0) {
		 		while ($row = $result->fetch_assoc()) {
		 			$record[] = $row;
		 		}
		 	}

		 	return $record;


		 }

		 // end get lga

		 // start get disease method
		public function getDisease(){
			$stmt = $this->conn->prepare("SELECT * FROM disease");

			// execute

			$stmt->execute();

			// get result

			$result = $stmt->get_result();

			// fetch result

			$record = array();
			if ($result->num_rows>0) {
				while ($row = $result->fetch_assoc()) {
					$record[] = $row;
				}
			}

			return $record;

		}
	   // end get disease method 

	
	   //3.    begin insert disease
		function insertDisease($diseaseId, $editorId, $lgaId, $stateId, $countryId, $status, $comment){
			
			$stmt = $this->conn->prepare("INSERT INTO reported_cases (disease_id, editor_id, lga_id, state_id, country_id, rd_status, rd_comment) VALUES(?,?,?,?,?,?,?)");


			// NOW, BIND THE PARAMETERS

			$stmt->bind_param("sisssss", $diseaseId, $editorId, $lgaId, $stateId, $countryId, $status, $comment);

			// execute

			$stmt->execute();

			// check if the insertion was successful
			if ($stmt->affected_rows == 1){
				return true;
			}else{
				return $stmt->error;
			}
		}


		// end insert disease
		

		// begin get input - list diseases
		function listRecordedCases(){
			// use prepare statement
			$statement = $this->conn->prepare("SELECT * FROM reported_cases JOIN disease on reported_cases.disease_id = disease.disease_id JOIN lga on reported_cases.lga_id = lga.lga_id JOIN country on reported_cases.country_id = country.country_id JOIN state on reported_cases.state_id=state.state_id");

			// execute
			$statement->execute();

			// return the result
			$result = $statement->get_result();

			// fetch result
			$records = array();
            if ($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $records[]=$row;
                };
            }
            return $records;
		}
		// end get input - list dieases

		// start get input for edit
		

		function getCases($rd_id){
			// prepare statement

			$stmt = $this->conn->prepare("SELECT * FROM reported_cases JOIN disease on reported_cases.disease_id = disease.disease_id JOIN lga on reported_cases.lga_id = lga.lga_id JOIN country on reported_cases.country_id = country.country_id JOIN state on reported_cases.state_id=state.state_id WHERE rd_id=?");

			// bind the defined parameters
			$stmt->bind_param("i", $rd_id);

			// execute
			$stmt->execute();

			// get result
			$output = $stmt->get_result();

			return $output->fetch_assoc();
		}

		// end get input for edit

		// start of function delete input
		function deleteCases($rd_id){
			// prepare statement
			$stmt = $this->conn->prepare("DELETE FROM reported_cases WHERE rd_id=?");

			$stmt->bind_param("i", $rd_id);

			// execute
			$stmt->execute();
		}

		// end of function delete input

		// begin get input - list diseases for particular user
		function listRecordedCasesByUser($editorId){
			// use prepare statement
			$statement = $this->conn->prepare("SELECT * FROM reported_cases JOIN disease on reported_cases.disease_id = disease.disease_id JOIN lga on reported_cases.lga_id = lga.lga_id JOIN country on reported_cases.country_id = country.country_id JOIN state on reported_cases.state_id=state.state_id WHERE editor_id=?");

			// bind param
			$statement->bind_param("i", $editorId);

			// execute
			$statement->execute();

			// return the result
			$result = $statement->get_result();

			// fetch result
			$records = array();
            if ($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $records[]=$row;
                };
            }
            return $records;
		}
		// end get input - list dieases

		// count number of registered users

		function countUsers(){
			$stmt = $this->conn->prepare("SELECT editor_id FROM editor");

			// execute params
			$stmt->execute();

			// return results
			$result = $stmt->get_result();


			$records = array();
            if ($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $records[]=$row;
                };
            }
			
			// return result	
			return $result;		
		}

		
		// end count of registered users

		// start delete users
		public function deleteUser(){
			$stmt=$this->conn->prepare("DELETE FROM editor WHERE editor_id=?");

			// bind params

			$stmt->bind_param("i", $editor_id);

			// execute statement
			$stmt->execute();
		}

		// end delete users

		// start count cases

		public function countRecordedCases(){
			$stmt = $this->conn->prepare("SELECT rd_id FROM reported_cases");

			// execute params
			$stmt->execute();

			// return results
			$result = $stmt->get_result();


			$records = array();
            if ($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $records[]=$row;
                };
            }
			
			// return result	
			return $result;		
		}

		// end count cases

		public function Search($query){
			$stmt = $this->conn->prepare("SELECT * FROM reported_cases JOIN disease ON reported_cases.disease_id = disease.disease_id JOIN lga ON reported_cases.lga_id = lga.lga_id JOIN country ON reported_cases.country_id = country.country_id JOIN state ON reported_cases.state_id=state.state_id WHERE (disease.disease_name LIKE '%$query%') ");

			// execute statment
			$stmt->execute();

			// get result
			$result = $stmt->get_result();
			
			// fetch result
			$records = array();
            if ($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $records[]=$row;
                }
            }
			return $result;
		}

		// start list editors
		public function listEditors(){
			$stmt = $this->conn->prepare("SELECT * FROM editor");

			// execute statment
			$stmt->execute();

			// get result
			$result = $stmt->get_result();

			// fetch result
			$records = array();
            if ($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $records[]=$row;
                }
            }
			return $result;
		}
		// end list editors

		// start insert into donation
		public function insertDonation($name, $phone, $email, $amount, $transaction_id, $tx_ref){
			$statement = $this->conn->prepare("INSERT INTO donation(name, phone, email, amount, transaction_id, transaction_ref) VALUES(?,?,?,?,?,?)");

			// bind parameters

			$statement->bind_param("sssiss", $name, $phone, $email, $amount, $transaction_id, $tx_ref);

			//execute statment
			$statement->execute();

			//trying to check if the insert statement is successful
			if ($statement->affected_rows == 1){
				return true;
			}else{
				return $statement->error;
			}
		}

		// end insert into donation

	}

	

?>