<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event Type'), ['action' => 'edit', $eventType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event Type'), ['action' => 'delete', $eventType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Event Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventTypes view large-9 medium-8 columns content">
    <h3><?= h($eventType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($eventType->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Color') ?></th>
            <td><?= h($eventType->color) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Events') ?></h4>
        <?php if (!empty($eventType->events)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Event Type Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Details') ?></th>
                <th><?= __('Start') ?></th>
                <th><?= __('End') ?></th>
                <th><?= __('All Day') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($eventType->events as $events): ?>
            <tr>
                <td><?= h($events->id) ?></td>
                <td><?= h($events->event_type_id) ?></td>
                <td><?= h($events->title) ?></td>
                <td><?= h($events->details) ?></td>
                <td><?= h($events->start) ?></td>
                <td><?= h($events->end) ?></td>
                <td><?= h($events->all_day) ?></td>
                <td><?= h($events->status) ?></td>
                <td><?= h($events->active) ?></td>
                <td><?= h($events->created) ?></td>
                <td><?= h($events->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Events', 'action' => 'view', $events->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Events', 'action' => 'edit', $events->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Events', 'action' => 'delete', $events->id], ['confirm' => __('Are you sure you want to delete # {0}?', $events->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
