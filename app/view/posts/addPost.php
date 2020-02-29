<?php require APPROOT . '/view/inc/header.php' ?>


	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card card-body bg-light mt-5">
				<h2>Add Post</h2>
				<p>Please fill in all fields</p>
				<form action="<?= URLROOT; ?>/posts/addPost" method="POST" enctype="multipart/form-data">
				
					<div class="form-group">
						<label for="title">Title:</label>
						<input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err']) ? 'is-invalid' : '') ?>" value="<?php echo(!empty($data['title']) ? '' : $data['title']) ?>"/>
						<span class="invalid-feedback"><?php echo $data['title_err'];?></span>
					</div>
					
					<div class="form-group">
						<label for="body">Body:</label>
						<textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err']) ? 'is-invalid' : '') ?>"></textarea>
						<span class="invalid-feedback"><?php echo $data['body_err'];?></span>
					</div>

					<div class="form-group">
						<label for="image">Select image for your post:</label>
						<input type="file" name="image" id="image" class="d-block" />
					</div>

					<div class="row">
						<div class="col-8">
							<input type="submit" value="Add Post" class="btn btn-success btn-block">
						</div>
						<div class="col-4">
							<a href="<?php echo URLROOT; ?>/post/reset" class="btn btn-light btn-block">Reset</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php require APPROOT . '/view/inc/footer.php' ?>