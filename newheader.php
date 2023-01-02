<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="shared/project_stylesheet.css" type="text/css"/>
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
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
    </style>
</head>
<body>

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
                        <li class="m-3"><a href="donate.php">Donate</a></li>
                    </ul>
                </div>
                <div class="col-md-2" id="login">
                    <button class="m-3 btn btn-outline-dark float-md-end"><a href="login.php">Login</a> </button>
                </div>
            </div>
        </div>
        
    </navigation>

    <?php 
         function sanitizeInput($data){
            $data = trim($data);
            $data = htmlspecialchars($data);
            $data = addslashes($data);
            $data = stripslashes($data);
                            
            return $data;
        }
    ?>
    
</body>
</html>