<?php require APPROOT . '/view/inc/header.php' ?>

	<div class="jumbotron text-center mb-3">
		<h1>My Posts</h1>
		<a href="<?php echo URLROOT; ?>/posts/addPost" class="btn btn-primary float-right d-block"><i class="fa fa-pencil pr-1"></i>Add Post</a>
	</div>

	<div class="row">

		<?php if(isset($data['hidden_post_id'])) : ?>
			<div class="col-md-12">
				<div class="card m-3 bg-light">
					<div class="card-body">
						<h4><?=$data['single']->title;?></h4>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php foreach($data['posts'] as $post) : ?>

			<?php if(!isset($data['hidden_post_id'])) : ?>
				
				<div class="col-md-12">
					<div class="card m-3 bg-light">
						<div class="card-body">
							<h4><?=$post->title;?></h4>
							<p><?=$post->body;?></p>
							<?php foreach($data['users'] as $user) : ?>
								<?php if($user->id == $post->user_id) : ?>
									
									<small>Created by: <?=$user->first_name . ' ' . $user->last_name?></small>
									<a href="<?=URLROOT?>/posts/single/<?=$post->id?>" class="btn btn-dark d-block mt-3">More</a>

								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>

			<?php endif; ?>

			

		<?php endforeach;?>
	</div>

<?php require APPROOT . '/view/inc/footer.php' ?>