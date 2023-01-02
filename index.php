<!-- header -->
<?php
// new header
    include_once('newheader.php');
?>
<head>
    <title>Home Page</title>
</head>
<!-- header ends -->


<!-- the main content starts here -->
    <!-- <p><a href="admin_login.php">Staff Login</a></p> -->
    <main>
        <div class="container-fluid" style="background-color:blanchedalmond; " >
            <div class="row">
                <div class="col-md-8" style="background-color:bisque; margin:auto; background-image:url(pictures/coronavirus-maps-disease.webp);">
                    <h4 class="text-warning mt-md-4">A database to search for the prevalence of various disease in Nigeria</h4>
                    <p class="text-center">To be part of the Army of contributors, click here to <span ><a href="signup.php" class="text-danger">sign up</a>.</p>
                    
                    <form action="search.php" method="get" class="form">
                        <input type="text" name="search" id="frontsearchbar" class="form-control" style="margin-top:100px;" placeholder="Search for a disease name (e.g. malaria)" />

                    
                        <div>
                            <button class="btn btn-outline-success fluid-md-end mt-md-2 align-items-md-end" type="submit" >Search</button>
                        </div>
                    </form>
                    
                </div>
            </div>

        </div>


    </main>
<!-- the main content ends here -->
<!-- there is a mistake to be corrected -->

<!-- footer -->
<?php
    include_once('footer.php');
?>
<!-- footer ends -->