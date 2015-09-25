<?php include 'header.php'; ?>
<div class="row col-xs-12" id="content">
	
	<div class="col-xs-12" id="editPageForm">
		<h4><?php echo $comment['userName']; ?>, please edit your comment below</h4>
		<form id="editCommentForm" action="index.php" method="POST">
			<input type="hidden" name="action" value="commentEdited" />
			<input type="hidden" name="destinationID" value="<?php echo $comment['destinationID']; ?>" />
			<input type="hidden" name="commentID" value="<?php echo $comment['commentID']; ?>" />
			<textarea rows="7"  name="content"><?php echo $comment['content']; ?></textarea><br /><br />
			<input type="submit" value="Save Comment" />
		</form>
	</div>
	
</div>
<?php include 'footer.php'; ?>