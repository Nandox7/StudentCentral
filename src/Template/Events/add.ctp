<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Event Types'), ['controller' => 'EventTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Type'), ['controller' => 'EventTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="events form large-9 medium-8 columns content">
    <?= $this->Form->create($event) ?>
    <fieldset>
    	<br/>
        <legend><?= __('Add Event') ?></legend>
        <?php
            echo $this->Form->input('event_type_id', ['options' => $groups]);
            echo "<br/>";
            echo $this->Form->input('event_type_id', ['options' => $eventTypes]);
            echo "<br/>";
            echo $this->Form->input('title');
            echo "<br/>";
            echo $this->Form->input('details');
            echo "<br/>";
            echo $this->Form->input('start');
            echo "<br/>";
            echo $this->Form->input('end');
            echo "<br/>";
            echo $this->Form->input('all_day');
            echo "<br/>";
            echo $this->Form->input('status');
            echo "<br/>";
            echo $this->Form->input('active');
            echo "<br/>";
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <button type = "submit" class="mdl-button mdl-js-button mdl-button--raised">Save</button>
    <?= $this->Form->end() ?>
</div>

<button type = "submit" class="mdl-button mdl-js-button mdl-button--raised">Save</button>