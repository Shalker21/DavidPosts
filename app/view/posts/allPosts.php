<?php require APPROOT . '/view/inc/header.php' ?>

	<div class="jumbotron text-center mb-3">
		<h1>All Posts</h1>
		<a href="<?php echo URLROOT; ?>/posts/addPost" class="btn btn-primary float-right d-block"><i class="fa fa-pencil pr-1"></i>Add Post</a>
	</div>

	<div class="row">

		<!-- ALERT ZA USPJESNO OBRISANI POST  -->
		<?php if(isset($data['deleted_post_id'])) : ?>
			
			<div class="col-md-12" id="success-alert">
				<div class="alert alert-success">Uspješno ste obrisali željeni post!</div>
			</div>

		<?php endif; ?>

		<!-- ISPIS SVIH POSTOVA POSTA -->
		<?php foreach($data['post'] as $post) : ?>

			<div class="col-md-12">
				<div class="card m-3 bg-light">
					<div class="card-body">
						<h4><?=$post->title;?></h4>
						<p><?=$post->body;?></p>
						<?php foreach($data['user'] as $user) : ?>
							<?php if($user->id == $post->user_id) : ?>
								
								<small>Created by: <?=$user->first_name . ' ' . $user->last_name?></small>
								<a href="<?=URLROOT?>/posts/single/<?=$post->id?>" class="btn btn-dark d-block mt-3">More</a>

							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

		<?php endforeach;?>
	</div>

	<script>
		setTimeout(function(){
    document.getElementById("success-alert").style.display="none";
}, 3000);
	</script>

<?php require APPROOT . '/view/inc/footer.php' ?>