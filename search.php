    <?php 
    
        include_once("newheader.php");
    
    ?>

<style>
    main{
        min-height: 400px;
    }
</style>


<main>
    <h2 class="text-center"> Results of <?php echo ucfirst($_GET['search']); ?> Search</h2>

   

    <table class="table table-bordered table-responsive-md table-active table-striped table-hover">
        <thead>
            <th>No.</th>
            <th>Disease</th>
            <th>Country</th>
            <th>State</th>
            <th>Local Government</th>
            <th>Status</th>
            <th>Comment</th>
        </thead>
        <tbody>
            <?php 
                if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['search'] != '') {
                    //var_dump($_GET['search']);
                    $query = $_GET['search'];
                                    // validate input
                    // var_dump($query);
                                    // sanitize input        
                    $query = sanitizeInput($query);
                    
                    // include function
                    include_once("csl.php");
                                
                    //create object of the user class
                    $obj = new Country();
                                
                    //access search method from the class
                    //var_dump($query);
                    $output = $obj->Search($query); 
                    $limit = 10; // number of results per page
                    $total_pages = ceil($obj->SearchCount($query) / $limit); // total number of pages 
                }else{  
                    header("Location:index.php");
                } 

                $number = 0;
                foreach ($output as $key => $value){
                   $number++;
                
            ?>
            
            <tr>
                <td> <?php echo $number."." ?> </td>
                <td> <?php echo $value['disease_name'] ?> </td>
                <td> <?php echo $value['country_name'] ?> </td>
                <td> <?php echo $value['state_name'] ?> </td>
                <td> <?php echo $value['lga_name'] ?> </td>
                <td> <?php echo ucfirst($value['rd_status']) ?> </td>
                <td> <?php echo ucfirst($value['rd_comment']) ?> </td>  
            </tr>
            
            <?php 
                }

            ?>


        </tbody>

        
    </table>
     <nav aria-label="Page navigation example"> 
                <ul class="pagination justify-content-center">
                  <li class="page-item <?php if($page == 1) echo 'disabled'; ?>">
                    <a class="page-link" href="search.php?search=<?php echo $query; ?>&page=<?php echo $page-1; ?>" tabindex="-1">Previous</a>
                  </li>

                <?php for($i = 1; $i <= $total_pages; $i++){ ?>
                  <li class="page-item <?php if($i == $page) echo 'active'; ?>">
                      <a class="page-link" href="search.php?search=<?php echo $query; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                  </li>
                <?php } ?>
                    <li class="page-item <?php if($page == $total_pages) echo 'disabled'; ?>">
                        <a class="page-link" href="search.php?search=<?php echo $query; ?>&page=<?php echo $page+1; ?>">Next</a>
                    </li>

                  </ul>
            </nav>
    
</main>



<?php
    include_once("footer.php");
?>