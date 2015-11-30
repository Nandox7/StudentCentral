
<div class="groupUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($groupUser) ?>
    <fieldset>
        <legend><?= __('Add User to Group') ?></legend>
        <?php
            echo "<select name=\"user_id\">";
            foreach($users as $user) {
                echo "<option value=\"" . $user['id'] . "\">" . $user['first_name'] . " " . $user['last_name'] . "</option>";
            }
            echo "</select></br>";
            //echo $this->Form->checkbox('is_admin', ['hiddenField' => false]) . " Admin";
        ?>
    </fieldset>
     <input type="hidden" name="group_id" value="<?php echo $group_id ?>" />
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
