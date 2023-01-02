<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wireframe</title>
    <link rel="stylesheet" href="shared/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    <style>
        #menu, #login li{
            list-style-type: none;
            display: inline-flex;
            font-size: medium;
            flex: auto;
            flex-direction: row;
            
        }

        #menu li a{
            text-decoration: none;
            color: black;
            padding-left: 10px;
        }

        #login ul li a{
            text-decoration: none;
            color:black;
            font-size: medium;
        }

        #menudiv ul li{
            align-items: flex-end;
            align-content: end;
        }

        

    </style>
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <em><strong>logo</strong></em>
                </div>
                
                <div class="col-md-7" id="menudiv">
                    <ul class="list-group " id="menu">
                        <li class="list-group-item "><a href="#">Home</a></li>
                        <li class="list-group-item"><a href="#">About Us</a></li>
                        <li class="list-group-item"><a href="#">Donate</a></li>
                        <li class="list-group-item "><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                
                <div class="col-md-1" id="login">
                    <ul >
                        <li><a href="login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    
    
</body>
</html>