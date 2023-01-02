<?php
    include_once('editor_user_header.php');
    // include_once('dashboard.php');
?>

<main>
<div class="container">
    <div class="row">
        <div class="col-md-8">

        <?php 
        // var_dump($_POST);
        // var_dump($_SESSION);
        ?>
            <table class="table table-bordered table-hover table-striped mt-md-3">
                <h3 class="text-center mt-md-3">List of All Reported Cases </h3>
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

                        $listR = $obj->listRecordedCases();
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

</main>


<?php
    include_once('editor_user_footer.php');
?>
