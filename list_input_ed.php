<?php
    include_once('editor_newheader.php');
    // include_once('dashboard.php');
?>
<head>
    <link rel="stylesheet" href="admin_dashboard.css">
</head>

<main>
<div class="container-fluid">
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
       <div class="col-md-11">
       <table class="table table-bordered table-hover table-striped">
                <h3>List of inputs </h3>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Disease Name</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>Local Government</th>
                        <th>Status</th>
                        <th>Comment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                        include_once('csl.php');

                        // create object of the class

                        $obj = new Country;
                        // reference the method to get the list
                        // $listR = $obj->listRecordedCases();

                        // here I want to have the id of the editors/users and pass it to fetch the whole data
                        $listEditors = $obj->listEditors();
                        foreach ($listEditors as $key => $value){

                        $listR = $obj->listRecordedCasesByUser($value['editor_id']);
                        }
                        // i dunno what to do
                        // loop thrugh the array


                        if (count($listR) > 0){
                            foreach ($listR as $key => $value){
                                $listId = $value['rd_id'];
                           
                    
                        
                    ?>
                    <tr>
                        <td> <?php echo $listId ?></td>
                        <td><?php echo $value['disease_name'] ?></td>
                        <td><?php echo $value['country_name'] ?></td>
                        <td><?php echo $value['state_name'] ?></td>
                        <td><?php echo $value['lga_name'] ?></td>
                        <td><?php echo $value['rd_status'] ?></td>
                        <td><?php echo $value['rd_comment'] ?></td>
                        <td><a href="edit_input.php?rd_id=<?php echo $listId ?>">Edit</a> | <a href="delete_input.php?rd_id=<?php echo $listId ?>">Delete</a></td>
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

</main>


<?php
    include_once('editor_user_footer.php');
?>
