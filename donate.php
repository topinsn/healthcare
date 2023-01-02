<?php
    include_once ('newheader.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <form action="payment.php" method="post">
                <div>
                    <label for=""> Name of Donor:</label>
                    <input type="text" name="name"  class="form-control text-md-center">
                </div>

                <div>
                    <label for=""> Email:</label>
                    <input type="email" name="email"  class="form-control text-md-center">
                </div>

                <div>
                    <label for="">Amount:</label>
                    <input type="number" name="amount" class="form-control" >
                </div>

                <div>
                    <label for="" class="form-label"> Phone Number:</label>
                    <input type="number" name="phone" class="form-control" >
                </div>

                <input type="submit" name="pay" class="form">
            </form>
        </div>

    </div>

</div>
<?php
    include_once 'footer.php';
?>
