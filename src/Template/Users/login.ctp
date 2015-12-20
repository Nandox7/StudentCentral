<div class="row">
	
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