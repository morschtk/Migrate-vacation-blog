<?php include 'header.php'; ?>
<div class="row col-xs-12" id="content">
	<div class="col-sm-4 col-xs-1" style="float: left;"></div>
	<div class="col-sm-4 col-xs-10" id="loginForm">
		<h3>Log In</h3>
		<p>All * fields are required.</p>
		<p><?php echo $error; ?></p>
		<form action="index.php" method="POST">
			<input type="hidden" name="action" value="logIn">
			<label for="logUserName">User Name*: </label>
				<input type="text" name="logUserName" placeholder="UserName" required /><br />
			<label for="logPassword">Password*: </label>
				<input type="password" name="logPassword" placeholder="Password" required /><br />

			<input type="submit" id="logSubmit" value="Login" />
		</form>
	</div>
	<div class="col-sm-4 col-xs-1" style="float: left;"></div>
</div>
<?php include 'footer.php'; ?>