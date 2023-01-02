<?php 
    include_once('editor_newheader.php');
   // var_dump($_SESSION);
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
            <table class="table table-active table-hover table-responsive-md table-striped table-primary table-bordered">
                <thead>
                    <th>No.</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Phone Number</th>
                    <th>Email Address</th>
                    <th>View input</th>
                    
                    
                </thead>
                <tbody>
                    <?php 
                        include_once("csl.php");

                        // create instance of the object 

                        $obj = new Country;

                        $listEditors = $obj->listEditors();

                        
                            $number = 0;
                            foreach ($listEditors as $key => $value){
                                
                                $number++;
                    ?>
                    <tr>
                        <td> <?php echo $number.'.' ?></td>
                        <td><?php echo $value['editor_fname'] ?></td>
                        <td><?php echo $value['editor_fname'] ?></td> 
                        <td><?php echo $value['editor_phone']?></td>
                        <td><?php echo $value['editor_email']?></td>
                        <td> <?php echo $value['editor_id'] ?></td>
                    </tr>

                    <?php
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