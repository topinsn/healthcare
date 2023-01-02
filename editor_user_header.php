<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shared/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="shared/project_stylesheet.css" type="text/css"/>
    <style>
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
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-success">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">My logo</a>
                
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="about_us.php">About Us</a>
                        </li>
                        
                        
                        <li class="nav-item ">
                            <a class="nav-link active" href="contact_us.php">Contact Us</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-warning" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
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