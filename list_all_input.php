<?php
    include_once('editor_newheader.php');
    // include_once('dashboard.php');
?>
<head>
    <link rel="stylesheet" href="admin_dashboard.css">
</head>
    

<main>
<div class="container-fuid">
    <div class="row">
        <div class="col-md-1 bg-warning" id="sidenav">
                <ul>
                    <li class="text-center"><a href="add_input.php"><strong> New Entry</strong></a></li>
                    <hr>
                    <li class="text-center"><a href="list_input.php"><strong>View my Entries</strong></a></li>
                    <hr>
                    <li class="text-center"><a href="list_editors.php"><strong>View Editors</strong></a></li>
                </ul>
        </div>
        <div class="col-md-11 table-responsive-md">

        <?php 
        // var_dump($_POST);
        // var_dump($_SESSION);
        ?>
        
            <div class="row">
                <div class="table-responsive-md">
                    <table class="table table-hover table-striped table-active caption-top table-bordered ">
                        <caption class="text-center">List of all Recorded Cases </caption>
                        <thead class= "table-light">
                            <tr class="text-center">
                                <th scope="col">No.</th>
                                <th scope="col">Disease Name</th>
                                <th scope="col">Country</th>
                                <th scope="col">State</th>
                                <th scope="col">Local Government</th>
                                <th scope="col">Status</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                include_once('csl.php');

                                // create object of the class

                                $obj = new Country;
                                // reference the method to get the list
                                // $listR = $obj->listRecordedCases();

                                $listR = $obj->listRecordedCases();
                                // i dunno what to do
                                // loop thrugh the array


                                if (count($listR) > 0){
                                    $number = 0;
                                    foreach ($listR as $key => $value){
                                        $listId = $value['rd_id'];
                                        $number++;
                                
                            
                                
                            ?>
                            <tr>
                                <th scope="row"> <?php echo $number.'.'; ?></th>
                                <td><?php echo $value['disease_name'] ?></td>
                                <td><?php echo $value['country_name'] ?></td>
                                <td><?php echo $value['state_name'] ?></td>
                                <td><?php echo $value['lga_name'] ?></td>
                                <td><?php echo ucfirst($value['rd_status']); ?></td>
                                <td><?php echo ucfirst($value['rd_comment']); ?></td>
                                <td colspan="5"><a href="edit_input.php?rd_id=<?php echo $listId ?>"><span class="text-info">Edit</span></a> | <a href="delete_input.php?rd_id=<?php echo $listId ?>"><span class="text-danger">Delete</span></a></td>
                            </tr>

                            <?php
                                }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        
            
        </div>
    </div>
</div>

</main>


<?php
    include_once('editor_user_footer.php');
?>
