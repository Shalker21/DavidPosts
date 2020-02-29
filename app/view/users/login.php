<?php require APPROOT . '/view/inc/header.php' ?>

<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card card-body bg-light mt-5">
				<h2>Login</h2>
				<p>Please fill in your credentials to log in</p>
				<form action="<?= URLROOT; ?>/users/login" method="POST">
				
					<div class="form-group">
						<label for="email">E-Mail: <sup>*</sup></label>
						<input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err']) ? 'is-invalid' : '') ?>" value="<?php echo(!empty($data['email']) ? $data['email'] : '') ?>"/>
						<span class="invalid-feedback"><?php echo $data['email_err'];?></span>
					</div>
					<div class="form-group">
						<label for="password">Password: <sup>*</sup></label>
						<input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err']) ? 'is-invalid' : '') ?>" />
						<span class="invalid-feedback"><?php echo $data['password_err'];?></span>
					</div>

					<div class="row">
						<div class="col">
							<input type="submit" value="Login" class="btn btn-success btn-block">
						</div>
						<div class="col">
							<a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light btn-block">No Account? Register</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


<?php require APPROOT . '/view/inc/footer.php' ?>