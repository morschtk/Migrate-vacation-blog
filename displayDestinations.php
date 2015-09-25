<?php include 'views/header.php'; ?>
<div class="row col-xs-12" id="content">
	<?php foreach ($destinations as $destination) { ?>
		<div class="destination col-xs-12 col-sm-6 col-md-4">
			<a class="title" href="?action=viewDestination&destinationID=
				<?php echo $destination['destinationID']; ?>">
				<?php echo $destination['destinationName'] ?>
				<br />
				<img  src="images/<?php echo $destination['destinationImage']; ?>.jpg" alt="Image: <?php echo $destination['destinationImage']; ?>.jpg">
			</a>
			<p>
				<?php echo $destination['destinationContent']; ?>
			</p>
		</div>
	<?php } ?>
</div>
<?php include 'views/footer.php'; ?>