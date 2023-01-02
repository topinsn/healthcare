<?php 

	// var_dump($_REQUEST);
	// exit();
	

	$stateid = $_REQUEST['stateid'];


	include_once('csl.php');
	$obj = new Country();

	// make reference

	$lga = $obj->getLGA($stateid);

	
	$options = "<option value=''>Choose LGA</option>";

	if (!empty($lga)) {
		foreach ($lga as $key => $value) {
			$lgaid = $value['lga_id'];
			$lganame = $value['lga_name'];

			$options.="<option value='$lgaid'>$lganame</option>";
			
		}
	}
	echo $options;

?>