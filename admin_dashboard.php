<?php
    include_once('editor_user_header.php');
?>

<head>
    <title>Admin Dashboard</title>

    <style>
        #ru{
            border: 1px solid black;
        }

        #rs_f{
            color:brown; 
            font-size: 20px;
        }

        #menu ul li a{
        color: beige;
    }
    </style>
</head>

<!-- dashboard creation starts -->

<!-- create buttons -->

<main>
    <div class="cointainer fluid flex-column">
        <div class="row">
            <div class="col-md-3 bg-secondary" id="menu">
                <ul>
                    <li><a href="add_input.php">New Entry</a></li>
                    <li><a href="list_input.php">View Recorded Cases</a></li>
                    <li><a href="view_editors.php">View Registered Users</a></li>
                </ul>
            </div>
            
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div>
                        <i class="fa fa-users" style='font-size:24px'></i>
                        </div>
                        <div class="mr-5">
                        <?php 
                            include_once ("csl.php");

                            // create object of the class

                            $obj = new Country;

                            // reference the method

                            $result = $obj->countUsers();
                            // var_dump($result);
                        ?>
                        <span id="rs_f"> <strong>
                            <?php echo $result->num_rows; ?>
                            </strong>
                        </span> Registered Users</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="view_editors.php">
                        <span class="float-left">View Users</span>
                        <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    </a>
                    </div>
                </div>

                <!-- card 2 number of recorded cases -->
                <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa fa-list"></i>
                </div>
                <div class="mr-5">
                <?php 
                    include_once ("csl.php");

                    // create object of the class

                    $obj = new Country;

                    // reference the method

                    $result = $obj->countRecordedCases();
                    // var_dump($result);
                    echo $result->num_rows;
                    
                ?> Recorded cases</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="list_all_input.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
            
          <!-- end of card two -->
                
        </div>
    </div>
</main>

<div class="cointainer fluid flex-column">
    

    <div class="row">
        
    </div>
</div>










<!-- displays data -->
<div id="output">
<!-- this place should be the output/display -->
</div>



<!-- dashboard creation ends -->
<?php
    include_once('editor_user_footer.php');
?>
