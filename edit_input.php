<?php
    include_once("editor_user_header.php");
    include_once("csl.php");

    // make object to get function
    $rpd_obj = new Country;

    // var_dump($_REQUEST);
    // this is to pick the id of the data input to be edited
    $data = $rpd_obj->getCases($_REQUEST['rd_id']);

    // let's check if the add button is clicked 
    if (isset($_POST['addNewInput'])){

        // validate the inputs now
        if(empty($_POST['disease_name'])){
            $errors['disease_name'] = "Select a Disease you want to log";
        }
        
        if(empty($_POST['country'])){
            $errors['country'] = "Select the country for record purpose";
        }

        if(empty($_POST['state'])){
            $errors['state'] = "Select the State";
        }

        if(empty($_POST['lga'])){
            $errors['lga'] = "Select the Local Government where this occur";
        }

        if(empty($_POST['status'])){
            $errors['status'] = "Select the status of the disease in your area";
        }

        if(empty($_POST['area'])){
            $errors['area'] = "Select the area";
        }

        // let's sanitise input for area as it is the only one users have to type in
        // include_once('loadstate.php');

        
    }
?>
<head>
    <title>Edit Disease</title>
</head>
<!-- add new input -->

<main>
    <?php 

    
    include_once('csl.php');
    $obj = new Country();

    // reference method

    

    $country = $obj->getCountry();

    $disease = $obj->getDisease();

    

        // echo "<pre>";
        // print_r ($country);
        // echo "</pre>";

    // var_dump($_POST);
    // var_dump($_REQUEST);
    // var_dump($_SESSION);
        // $diseaseId = $_POST['disease_name'];
        // $editorId = $_SESSION['editor_id'];
        // $lgaId = $_POST['lga'];
        // $stateId = $_POST['state'];
        // $countryId = $_POST['country'];
        // $status = $_POST['status'];
        // $comment = sanitizeInput($_POST['comment']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // include the csl file which contains the functions 
    
                // include_once('csl.php');
    
                // create object of the class
    
                $obj = new Country();
    
                // now, add into area table
                // $add_area = $obj->
                // now, i want to add the new disease to the database
    
                $add = $obj->insertDisease($_POST['disease_name'], $_SESSION['editor_id'], $_POST['lga'], $_POST['state'], 
                $_POST['country'], $_POST['status'], sanitizeInput($_POST['comment']));
    
                if($add == true){
                    $msg = "disease was successfully added";
                    echo $msg;
                    
                }else{
                    $error_message = "Disease not successfully added";
                    echo $error_message;
                }
        }

    ?>

    <div class="container-fluid">
        <div class="row">
            <!-- check if the error conditions set above are not triggered -->
            <?php
                if(!empty($errors)){
                    echo "<ul>";
                    foreach($errors as $key => $value){
                    echo "<li>$value</li>";
                    }
                    echo "</ul>";
                }
            ?>
            <div class="col-md-6" style="margin:auto; background:brown;">
                <div style="margin:auto">
                    <form action="" method="post" >
                        <h2 style="text-align: center;" class="mt-md-3">Edit input</h2>
                        <div>
                            <label class="label-control mt-md-3">Disease name: </label>
                            <select name="disease_name" id="disease_name" class="form-select mt-md-2" required>
                                <option value="">--Choose Disease--</option>
                           
                                <?php 


                                    if (count($disease)>0) {
                                        foreach ($disease as $key => $value) {
                                            $diseaseid = $value['disease_id'];
                                            $diseasename = $value['disease_name'];
                                            echo "<option value='$diseaseid'>$diseasename</option>";
                                        }
                                    }
                                ?>
                                <option value="<?php if (isset($data['disease_id'])){echo $data['disease_id'];}?>" selected><?php echo $data['disease_name'];?></option> 
                            </select>
                            <!-- validation check starts-->
                            <?php
                                if (!empty($errors['disease_name'])){
                                echo "<div class='text-danger'>".$errors['disease_name']."</div>";
                                }
                            ?>
                            <!-- validatin check ends -->
                        </div>
                        
                        <div>
                            <label class="mt-md-3">Country name: </label>
                            <select id="country" name="country" id="country" class="form-control form-select mt-md-2" required>
                                <option value="">--Select Country--</option>
                                <?php 
                                    if (count($country)>0) {
                                        foreach ($country as $key => $value) {
                                            $countryid = $value['country_id'];
                                            $countryname = $value['country_name'];
                                            echo "<option value='$countryid'>$countryname</option>";
                                        }
                                    }
                                ?>
                                <option value="<?php if (isset($data['country_id'])){echo $data['country_id'];}?>" selected><?php echo $data['country_name'];?></option> 
                                
                            </select>
                            <!-- validation check starts-->
                            <?php
                                if (!empty($errors['country'])){
                                echo "<div class='text-danger'>".$errors['country']."</div>";
                                }
                            ?>
                            <!-- validatin check ends -->
                        </div>

                        <div>
                            <label class="label-control mt-md-3">State: </label>
                            <select id="state" name="state" id="state" class="form-select mt-md-2" disabled required>
                                <option value="" >--Select State--</option>
                                <option value="<?php if (isset($data['state_id'])){echo $data['state_id'];}?>" selected><?php echo $data['state_name'];?></option> 
                                
                            </select>
                            <!-- validation check starts-->
                            <?php
                                if (!empty($errors['state'])){
                                echo "<div class='text-danger'>".$errors['state']."</div>";
                                }
                            ?>
                            <!-- validatin check ends -->
                        </div>
                        
                        <div>
                            <label class="label-control mt-md-3">Local Government Area: </label>
                            <select class="form-select mt-md-2" id="lga" name="lga" disabled required>
                                <option value="" >--Select Local Government--</option>
                                <option value="<?php if (isset($data['lga_id'])){echo $data['lga_id'];}?>" selected><?php echo $data['lga_name'];?></option>  			    
                            </select>

                            <!-- validation check starts-->
                            <?php
                                if (!empty($errors['lga'])){
                                echo "<div class='text-danger'>".$errors['lga']."</div>";
                                }
                            ?>
                            <!-- validatin check ends -->
                        </div>

                        <!-- <div>
                            <label class="label-control mt-md-3">Area: </label>
                            <input type="text" name="area" id="area" class="form-control mt-md-2" required/>
                        </div> -->
                        <div>
                            <label class="label-control mt-md-3">Status: </label>
                            <select id="status" name="status" class="form-select mt-md-2" required>
                                <option value="" selected disabled>--Select Status--</option>
                                <option value="active">Active</option>
                                <option value="mortality">Mortality</option>
                                <option value="closed">Closed</option>
                                <option value="<?php if (isset($data['rd_status'])){echo $data['rd_status'];}?>" selected><?php echo $data['rd_status'];?></option>
                            </select>

                            <!-- validation check starts-->
                            <?php
                                if (!empty($errors['status'])){
                                echo "<div class='text-danger'>".$errors['status']."</div>";
                                }
                            ?>
                            <!-- validatin check ends -->
                        </div>

                        <div>
                            <label class="label-control mt-md-3">Comment: </label>
                            <textarea type="text" name="comment" id="comment" class="form-control mt-md-2"><?php if (isset($data['rd_comment'])){echo $data['rd_comment'];}?></textarea>
                            
                        </div>

                        <div class="mb-3">
                            <input class="btn btn-danger mt-md-3" type="reset" value="Reset">
                            <input type="submit" class="btn btn-success mt-md-3" value="Add new input" id="addNewInput" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../jquery/jquery.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                // get state based on country selected
                $('#country').change(function(){

                    // get country id
                    
                    var countryid = $(this).val();


                    // fetch lgas using ajax method

                    $.ajax({
                        url:"loadstate.php",
                        type:"POST",
                        data:{countryid:countryid},
                        success: function(response){
                            $('#state').html(response);
                            $('#state').prop('disabled', false);
                            },
                        error: function(err){
                            alert("Something is broken");
                            }
                    });
                
                });
                 
                $('#state').change(function(){

                    // get state id
                    
                    var stateid = $(this).val();


                 //    fetch lgas using ajax method

                    $.ajax({
                        url:"loadlga.php",
                        type:"POST",
                        data:{stateid:stateid},
                        success: function(response){
                            $('#lga').html(response);
                            $('#lga').prop('disabled', false);
                        },
                        error: function(err){
                            alert("Something is broken");
                        }
                    });   
                });

                $('#lga').change(function(){
                    // get lgaid which will be used latter for inserting in to the reported dieases

                    var lgaid = $(this).val();
                })
            });
        </script>

</main>


<!-- edit something -->

<?php
    include_once('editor_user_footer.php');
?>