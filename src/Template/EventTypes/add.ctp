<?php
            echo $this->Html->script('moment.min.js');
            echo $this->Html->script('jquery.min.js');
            echo $this->Html->script('fullcalendar.min.js');
            echo $this->Html->script('calendar.js');
            echo $this->Html->css('fullcalendar.css');
            echo $this->Html->css('tasks.css');
            echo $this->Html->css('newstyle.css');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav" style = "display:inline">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Event Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($eventType) ?>
    <fieldset>
        <legend><?= __('Add Event Type') ?></legend>
        <?php
        	echo "<br/>";
            echo $this->Form->input('name');
            echo "<br/>";
            echo $this->Form->input('color');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <button type = "submit" class="mdl-button mdl-js-button mdl-button--raised">Submit</button>
    <?= $this->Form->end() ?>
</div>

<button type = "submit" class="mdl-button mdl-js-button mdl-button--raised">Save</button>