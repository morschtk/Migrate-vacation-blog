<?php include('views/header.php'); ?>
<div class="row col-xs-12" id="content">
	<div class="col-xs-12" id="top">
		<h2 class="col-xs-12"><?php echo $destinationName; ?></h2>
		<p class="col-xs-12">
			<img src="<?php echo $destinationImage; ?>" alt="<?php echo $imageAlt; ?>" />
		</p>
		<div class="col-xs-0 col-sm-3"></div>
		<p class="col-xs-12 col-sm-6"><?php echo $destinationContent; ?></p>
		<div class="col-xs-0 col-sm-3"></div>
	</div>
	<div class="col-xs-12" id="middle">
	<!-- Add a comment area -->
	<?php if(isset($_SESSION['loggedIn'])){ ?>
		<h4 style="margin-bottom: 0px;">Add a comment!</h4>
		<small style="color:#aa0000;"><?php echo $error; ?></small>
		<form id="addCommentForm" action="index.php" method="POST">
			<input type="hidden" name="action" value="addComment" />
			<input type="hidden" name="destinationID" value="<?php echo $destinationID; ?>" />
			<textarea rows="7" id="commentContent" placeholder="Enter your comment here!" name="content"></textarea><br />
			<input type="submit" value="Add Comment" />
		</form>

		<script type="text/javascript">
			document.getElementById('addCommentForm').onsubmit = function(){
				if(document.getElementById('commentContent').value.length === 0){
					alert("Please type a comment.");
					return false;
				}else{
					console.log("something");
					return true;
				}
			}
		</script>

	<?php } else { ?>
		<small>To add a comment please Register or Log In.</small>
		<br /><br />
	<?php } ?>
	</div>
	<div class="col-xs-12" id="bottom">
		<?php foreach ($comments as $comment) {
			$name = $comment['userName']; ?>
			<ul class="commentList col-xs-12">
				<li class="col-xs-12">
					<p class="userCommented"><?php echo $name; ?></p>
					<p class="commentDate"> -<?php echo date('l M jS', $comment['postDate']); ?></p>
				</li>
				<li class="col-xs-12">
					<p class="theComment"><?php echo $comment['content']; ?></p>
				</li>
				<?php 
					if(isset($_SESSION['loggedIn'])){ 
						if($_SESSION['user'] == $name){
				?>
					<li class="col-xs-12">
						<form class="editCommentButton" action="index.php" method="POST">
							<input type="hidden" name="commentID" value="<?php echo $comment['commentID']; ?>" />
							<input type="hidden" name="action" value="editComment" />
							<input type="submit" name="editButton" value="Edit Comment" />	
						</form>
						<form class="deleteCommentButton" action="index.php" method="POST">
							<input type="hidden" name="commentID" value="<?php echo $comment['commentID']; ?>" />
							<input type="hidden" name="destinationID" value="<?php echo $comment['destinationID']; ?>" />
							<input type="hidden" name="action" value="deleteComment" />
							<input type="submit" name="deleteButton" value="Delete Comment" />	
						</form>
					</li>
					<?php } ?>
				<?php } ?>	
			</ul>
		<?php } ?>
	</div>
</div>
<?php include('views/footer.php'); ?>