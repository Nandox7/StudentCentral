<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Event Types'), ['controller' => 'EventTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Type'), ['controller' => 'EventTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="events view large-9 medium-8 columns content">
    <h3><?= h($event->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Event Type') ?></th>
            <td><?= $event->has('event_type') ? $this->Html->link($event->event_type->name, ['controller' => 'EventTypes', 'action' => 'view', $event->event_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($event->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($event->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($event->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Start') ?></th>
            <td><?= h($event->start) ?></tr>
        </tr>
        <tr>
            <th><?= __('End') ?></th>
            <td><?= h($event->end) ?></tr>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($event->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($event->modified) ?></tr>
        </tr>
        <tr>
            <th><?= __('All Day') ?></th>
            <td><?= $event->all_day ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $event->active ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="row">
        <h4><?= __('Details') ?></h4>
        <?= $this->Text->autoParagraph(h($event->details)); ?>
    </div>
</div>
