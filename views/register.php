<?php include 'header.php'; ?>
<div class="row col-xs-12" id="content">
	<div class="col-sm-4 col-xs-1" style="float: left;"></div>
	<div class="col-sm-4 col-xs-10" id="regForm">
		<h3>Register</h3>
		<p>All * fields are required.</p>
		<p><?php echo $error; ?></p>
		<form action="index.php" method="POST">
			<input type="hidden" name="action" value="reg" />
			<label for="regEmail">E-mail*: </label>
				<input type="email" name="regEmail" placeholder="HeadRichard@alfredstate.edu" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[a-z]{2,4}$" required /><br />
			<label for="regUserName">User Name*: </label>
				<input type="text" name="regUserName" placeholder="UserName" required /><br />
			<label for="regPassword">Password*: </label>
				<input type="password" name="regPassword" placeholder="Password" required /><br />

			<input type="submit" id="regSubmit" value="Register" />
		</form>
	</div>
	<div class="col-sm-4 col-xs-1" style="float: left;"></div>
</div>
<?php include 'footer.php'; ?>