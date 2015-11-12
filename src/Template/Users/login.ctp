<div class="row">
	<div class="columns large-3">
		<ul>
			<li>
				<a href="<?= $this->Url->build( '/users/register', true );?>">Register</a>
			</li>
			<li>
				<a href="<?= $this->Url->build( '/users/login', true );?>">Login</a>
			</li>
			<li>
				<a href="<?= $this->Url->build( '/users/logout', true );?>">Logout</a>
			</li>
		</ul>
	</div>
	<div class="columns large-9">
		<div class="users form">
			<?= $this->Flash->render('auth') ?>
			<?php 
			if($this->request->session()->read('Auth.User')){
				var_dump($this->request->session()->read('Auth.User'));
			}else{
				?>
				<?= $this->Form->create() ?>
					<fieldset>
						<legend><?= __('Please enter your username and password') ?></legend>
						<?= $this->Form->input('username') ?>
						<?= $this->Form->input('password') ?>
					</fieldset>
				<?= $this->Form->button(__('Login')); ?>
				<?= $this->Form->end() ?>
				<?php
			}
			?>
			
		</div>
	</div>
	
</div>