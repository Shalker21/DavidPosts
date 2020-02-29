<?php require APPROOT . '/view/inc/header.php' ?>


	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card card-body bg-light mt-5">
				<h2>Edit Post</h2>
				<p>You can</p>
				<form action="<?= URLROOT; ?>/posts/updatePost" method="POST" enctype="multipart/form-data">
				
					<div class="form-group">
						<label for="title">Title:</label>
						<input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err']) ? 'is-invalid' : '') ?>" value="<?php echo $data['single']->title; ?>"/>
						<span class="invalid-feedback"><?php echo $data['title_err'];?></span>
					</div>
					<input type="hidden" name="hidden_id_of_post" value="<?=$data['single']->id?>" />
					<div class="form-group">
						<label for="body">Body:</label>
						<textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err']) ? 'is-invalid' : '') ?>"><?php echo $data['single']->body; ?></textarea>
						<span class="invalid-feedback"><?php echo $data['body_err'];?></span>
					</div>

					<div class="form-group">
						<label for="image">Select image for your post:</label>
						<input type="file" name="image" id="image" class="d-block" />
					</div>

					<div class="row">
						<div class="col-8">
							<input type="submit" value="Edit Post" class="btn btn-success btn-block">
						</div>
						<div class="col-4">
							<a href="<?php echo URLROOT; ?>/posts/single/<?=$data['single']->id;?>" class="btn btn-light btn-block">Back</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php require APPROOT . '/view/inc/footer.php' ?>