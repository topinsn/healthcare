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
                
                                // sanitize input        
                $query = sanitizeInput($query);
                
                // include function
                include_once("csl.php");
                            
                //create object of the user class
                $obj = new Country();
                            
                //access search method from the class
                //var_dump($query);
                $output = $obj->Search($query);   
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
    
</main>



<?php
    include_once("footer.php");
?>