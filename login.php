<?php 
	include_once('newheader.php');
?>
<style>
	#box{
		min-height: 450px;
	}

	#vertical_line{
		height: 300px;
        border-right: 1px solid #000;
        right: 50%;
		padding: 10px;
	}

	#adminLogin a, #call2action a{
		color:red;
		text-decoration: none;
		font-size: 20px;
	}

	p, legend{
		font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
	}

	legend{
		font-size: 29.2px;
	}
	
</style>
<?php 
	session_start();
// check if the login button is clicked
	include_once('shared/user.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// create object of login
	$obj = new User();

	$obj->login($_POST['email'], $_POST['password']);

	if ($obj == false) {

		$error = "<div style='color:red'>Invalid details</div>";

	}else{

		header("Location: dashboard.php");
		exit(); //this is inserted to stop the function
	}

}

?>
<div style="min-height: 30px;">
	<!-- <input type="button" value="Logout" class="btn btn-danger" href="logout.php"> -->
</div>
<div class="container-fluid" id="box">
	<div class="row">
		<div class="col-md-4 ms-md-2" id="vertical_line">
			<form action="" method="post">
				<fieldset>
					<legend class="text-center"><strong> Member Login </strong></legend>
					<input type="email" name="email" placeholder="Email" class="form-control ">
					<input type="password" name="password" placeholder="password" class="form-control mt-md-3 ">
					<input type="submit" name="submit" value="Login" class="btn btn-success mt-3 ">
				</fieldset>
			</form>
			
		</div>
		<div class="col-md-4 mt-md-5" >
			<p>If you are a new to this page, please <Span id="call2action"><a href="signup.php">signup here</a></Span></p>

			<p>Admin, please <span id="adminLogin"><a href="admin_login.php">login here</a></span></p>
			
		</div>
	</div>
</div>

<?php 
	include_once('footer.php');
?>