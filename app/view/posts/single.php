<?php require APPROOT . '/view/inc/header.php' ?>

	<div class="jumbotron text-center mb-3">

		<h1>Single Post</h1>
		<a href="<?php echo URLROOT; ?>/posts/addPost" class="btn btn-primary float-right"><i class="fa fa-pencil pr-1"></i>Add Post</a>
	
	</div>

	<div class="row">

		<div class="col-md-12">

			<div class="card m-3 bg-light">

				<div class="card-body">

					<h4><?php echo $data['single']->title;?></h4>
					<p><?=$data['single']->body;?></p>

					<?php foreach($data['users'] as $user) : ?>

						<?php if($user->id == $data['single']->user_id) : ?>

							<p>Created by: <?=$user->first_name?> <?=$user->last_name?></p>

						<?php endif; ?>

					<?php endforeach; ?>

					<small><?=$data['single']->created_at?></small>

				</div>
				
			</div>

			<?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data['single']->user_id) : ?>

				<a href="<?php echo URLROOT; ?>/posts/hidePost/<?=$data['single']->id?>" class="btn btn-primary float-right d-block m-3"><i class="fa fa-eye-slash pr-1"></i>Hide</a>
				<button type="button" onclick="deletePost()" id="deleteButton">Delete</button>
				<a href="javascript:void(0)" data-id="<?=$data['single']->id?>" class="btn btn-danger float-right d-block mt-3"><i class="fa fa-trash pr-1"></i>Delete</a>
				<a href="<?php echo URLROOT; ?>/posts/single/<?=$data['single']->id?>>" id="edit" class="btn btn-success float-right d-block m-3"><i class="fa fa-edit pr-1"></i>Edit</a>

			<?php endif; ?>
			
			<a href="<?php echo URLROOT; ?>/posts/allPosts" class="btn btn-dark float-left d-block m-3"><i class="fa fa-arrow-left pr-1"></i>Back</a>
		
		</div>

	</div>
	<?php require APPROOT . '/view/inc/footer.php' ?>
