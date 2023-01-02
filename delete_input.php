<?php 
    include_once("csl.php");

    // create object of the class

    $obj = new Country;


    $listR = $obj->listRecordedCases();

        if (count($listR) > 0){
            foreach ($listR as $key => $value){
            $listId = $value['rd_id'];
            }
        }    
                           
    // reference the object
    
    $stmt = $obj->deleteCases($listId);
?>