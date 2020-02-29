<?php require APPROOT . '/view/inc/header.php' ?>

	<div class="jumbotron text-center mb-3">

		<h1>Single Post</h1>
		<a href="<?php echo URLROOT; ?>/posts/addPost" class="btn btn-primary float-right"><i class="fa fa-pencil pr-1"></i>Add Post</a>
		<h2><?=$deleted['deleted_post_title']?></h2>
	
</div>
	<?php require APPROOT . '/view/inc/footer.php' ?>
