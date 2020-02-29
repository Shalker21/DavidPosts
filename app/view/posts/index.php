<?php require APPROOT . '/view/inc/header.php' ?>


<div class="jumbotron text-center mb-3">
	<h1><?=$data['title'];?></h1>
</div>
<a href="<?php echo URLROOT; ?>/posts/addPost" class="btn btn-primary float-right"><i class="fa fa-pencil pr-1"></i>Add Post</a>

<?php require APPROOT . '/view/inc/footer.php' ?>