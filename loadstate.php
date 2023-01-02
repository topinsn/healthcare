<?php 

	// var_dump($_REQUEST);
	// exit();
	

	$countryid = $_REQUEST['countryid'];


	include_once('csl.php');
	$obj = new Country();

	// make reference

	$state = $obj->getStates($countryid);

	
	$options = "<option value=''>--Choose State--</option>";

	if (!empty($state)) {
		foreach ($state as $key => $value) {
			$stateid = $value['state_id'];
			$statename = $value['state_name'];

			$options.="<option value='$stateid'>$statename</option>";
			
		}
	}
	echo $options;

?>