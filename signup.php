
<?php
    include_once('newheader.php');
?>
<head>
    <title>Sign Up</title>
</head>



<main>

    <?php

        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";   

        // check if submit button is clicked 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // validate input

        // sanitize input


                // include shared folder
                include_once("shared/user.php");
                //create object of the user class

                $obj = new User();

                //access insert user
                $output = $obj->registerEditor($_POST['fname'], $_POST['lname'], $_POST['phone'], $_POST['email'], $_POST['password'],  $_POST['address']);
        }
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6" style="margin: auto;height:auto">

                <form method="POST" action="">

                    <h3 style="text-align: center;" class="mt-md-3 mb-md-3">Sign-up Form</h3>

                    <?php

                        if (isset($output)){
                            echo $output;
                            header('Location: loginsuccess.php');
                        }
                    ?>
                    <div class="control-group form-group">
                        <div class="controls">
                            <input type="text" name="fname" id="fname" placeholder="Please, input your firstname" value="" class="form-control" required />
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls mt-md-3">
                            <input type="text" name="lname" id="lname" placeholder="Please, input your lastname/surname" value="" class="form-control" required />
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls mt-md-3">
                            <input type="tel" name="phone" id="phone" placeholder="Please, input your phone number" value="" class="form-control" required />
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls mt-md-3">
                            <textarea type="text" name="address" id="address" placeholder="Please, input your address" value="" class="form-control" required></textarea>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls mt-md-3">
                            <input type="email" name="email" id="email" placeholder="Please, input your email address" value="" class="form-control" required>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls mt-md-3">
                            <input type="password" name="password" id="password" placeholder="Please, input your preferred password" value="" class="form-control" required />
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls mt-md-3 mb-md-3">
                            <input type="submit" name="submit" id="btnSignUp" value="Sign Up" class="form-control btn btn-outline-success mb-md-3"/>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

    
</main>

<!-- footer -->
<?php 
    include_once('footer.php');
?>
<!-- footer ends