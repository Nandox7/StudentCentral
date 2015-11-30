<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $groupUser->group_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $groupUser->group_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Group Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="groupUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($groupUser) ?>
    <fieldset>
        <legend><?= __('Edit Group User') ?></legend>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('is_admin');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
