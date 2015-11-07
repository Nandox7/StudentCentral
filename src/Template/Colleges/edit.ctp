<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $college->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $college->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Colleges'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="colleges form large-9 medium-8 columns content">
    <?= $this->Form->create($college) ?>
    <fieldset>
        <legend><?= __('Edit College') ?></legend>
        <?php
            echo $this->Form->input('college_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
