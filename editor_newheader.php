<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="shared/project_stylesheet.css" type="text/css"/>
    <link rel="stylesheet" href="shared/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    <style>
        navigation ul li{
            display: inline-block;
            flex-direction: row;
            list-style-type: none;
        }

        navigation ul li a{
            text-decoration: none;
            color:black;
        }

        #login a{
            text-decoration: none;
            color:inherit;
        }

        #welcome{
            color:blueviolet;

        }

        #logout a{
            color:white;
            text-decoration: none;
        }

        #menu ul li a{
            text-decoration: none;
        }

        #menu ul li{
            list-style-type: none;
            color:black;
            font-size: 20px;;
        }

        #menu{
            border-right-style: solid;
            border-right: 1px solid black;
        }

        main{
            min-height: 450px;
        }
    </style>
</head>
<body>
<?php 

    // here, I want to protect the page from being accessed directly from the browser tab. You gerrit?

    session_start();

    // check for the session logger

    if (!isset($_SESSION['2FA']) & $_SESSION['2FA'] != 'Gb%JqwF5mt3hcLc&+fe4ZV=DvLWaq#rM+@q4N4r_dw#VB_7&+UJjz7ADzBD?') {
        // redirect to login page to login
        $response = "Please Login";

        header("Location: login.php?m=$response");
        session_reset();
        exit();
    }

    // sanitise function
    function sanitizeInput($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = addslashes($data);

        return $data;
    }
    // end sanitise function 
    ?>
    <navigation>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <a href="index.php">
                        <img src="pictures/logo.svg" alt="logo" class="image-fluid" />
                    </a>
                    
                </div>
                <div class="col-md-8 ">
                    <ul class="float-md-end">
                        <li class="m-3" ><a href="index.php">Home</a> </li>
                        <li class="m-3"><a href="about_us.php">About Us</a> </li>
                        <li class="m-3">Donate</li>
                    </ul>
                </div>
                <div class="col-md-2" id="login">
                    <button class="m-3 btn btn-outline-dark float-md-end"><a href="login.php">Login</a> </button>
                </div>
            </div>
        </div>
        
    </navigation>
    <section>
        <div class="container-fluid"></div>
            <div class="row">      
                <div class="col-md-6 text-md-start ps-md-4 mt-md-3">
                    <h3 id="welcome">Welcome <?php echo $_SESSION['firstname']. ' '. $_SESSION['lastname'];?> </h3>
                </div>
                    
                <div class="col-md-6 text-md-end pe-md-4 mt-md-3" id="logout">
                    <button class="btn btn-danger"><a href="logout.php">Logout</a></button>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>