<div class="row">
	<div class="columns large-9">
		<div class="users form">
		<?= $this->Form->create($user) ?>
			<?php 
			if($this->request->session()->read('Auth.User')){
				var_dump($this->request->session()->read('Auth.User'));
			}else{
				?>
				<fieldset>
					<legend><?= __('Register New Account') ?></legend>
					<?= $this->Form->input('first_name') ?>
					<?= $this->Form->input('last_name') ?>
					<?= $this->Form->input('email') ?>
					<?= $this->Form->input('username') ?>
					<?= $this->Form->input('password') ?>
					<?php
			            echo "<select name=\"course_id\">";
			            foreach($courses as $course) {
			                echo "<option value=\"" . $course['id'] . "\">" . $course['course_name'] . " (" . $course[course_code] .  ")</option>";
			            }
			            echo "</select></br>";
			        ?>
				</fieldset>
				<?= $this->Form->button(__('Submit')); ?>
				<input type="submit" name="Submit"/>
				<?= $this->Form->end() ?>
				<?php
			}
			?>
		</div>
	</div>
</div>