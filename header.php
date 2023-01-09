<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="shared/project_stylesheet.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
</head>
<body>
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

<!--                    search bar starts here-->
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-warning" type="submit">Searcher</button>
                    </form>
                </div>
            </div>
        </nav>
        <?php 
         function sanitizeInput($data){
            $data = trim($data);
            $data = htmlspecialchars($data);
            $data = addslashes($data);
            $data = stripslashes($data);
                            
            return $data;
        }
    ?>
    </header>