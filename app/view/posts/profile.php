<?php require APPROOT . '/view/inc/header.php' ?>

<div class="jumbotron text-center mb-3">

		<h1>Profile</h1>
	
	</div>

	<?php foreach($data['users'] as $user) : ?>

		<?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $user->id) : ?>
		
			<div class="row border p-3">
				<div class="col-md-4 bg-dark">
					<!-- TREBA STAVITI SLIKU -->
				</div>

				<div class="col-md-8 bg-light">
					<p><span class="text-primary">IME: </span><?=$user->first_name?></p>
					<p><span class="text-primary">PREZIME: </span><?=$user->last_name?></p>
					<p><span class="text-primary">EMAIL: </span><?=$user->email?></p>
					<p><span class="text-primary">PASSWORD: </span><?=$user->password?></p>
				</div>
				
			</div>

		<?php endif; ?>

	<?php endforeach; ?>

<?php require APPROOT . '/view/inc/footer.php' ?>