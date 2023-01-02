<?php 
	include_once('header.php');
?>

<?php 
	session_start();
// check if the login button is clicked
	include_once('shared/user.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// create object of login
	$obj = new User();

	$obj->adminLogin($_POST['email'], $_POST['password']);

	if ($obj == false) {

		$error = "<div style='color:red'>Invalid details</div>";

	}else{

		header("Location: admin_dashboard.php");
		exit(); //this is inserted to stop the function
	}

}


?>

<style>
	main{
		min-height: 450px;
	}
</style>
<main>
	<div class="container-fluid d-md-flex justify-content-center pt-md-5">
		<div class="flex-md-row">
			<div class="col-md-12">
				<form action="" method="post" >
				<h3 class="text-md-center">Admin Login</h3>
					<fieldset>
						<input type="email" name="email" placeholder="Email" class="form-control mt-md-3">
						<input type="password" name="password" placeholder="password" class="form-control mt-md-3">
					</fieldset>
					
					<input type="submit" name="submit" value="Login" class="mt-md-3 btn btn-outline-success">
				</form>
			</div>
		</div>
	</div>
</main>
	

<?php 
	include_once('footer.php');
?>