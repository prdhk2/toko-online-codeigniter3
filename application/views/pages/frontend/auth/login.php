<main role="main" class="container">

<div class="row">
<div class="col-md-8 mx-auto">
	<?php $this->load->view('layouts/frontend/_alert') ?>
</div>
</div>

<div class="row mb-3">
<div class="col-md-6 mx-auto">
	<div class="card p-3 mb-5 bg-body rounded" style="border: none;">
		<div class="card-body p-5">
			<h6 class="text-uppercase text-center mb-5">Welcome Back My Friend !!!</h6>
			<h2 class="text-uppercase text-center mb-5"><span style="color:red;">Login</span> Here</h2>
				<div class="card-body">
					<?= form_open('login', ['method' => 'POST']) ?>
						<div class="form-group">
							<label for="">Email</label>
							<?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukan email', 'required' => true]) ?>
							<?= form_error('email') ?>
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password', 'required' => true]) ?>
							<?= form_error('password') ?>
						</div>
						<button type="submit" class="btn btn-primary">Login</button>
					<?= form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
