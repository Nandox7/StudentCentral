<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Group User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="groupUsers index large-9 medium-8 columns content">
    <h3><?= __('Group Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('group_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('is_admin') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($groupUsers as $groupUser): ?>
            <tr>
                <td><?= $this->Number->format($groupUser->id) ?></td>
                <td><?= $groupUser->has('group') ? $this->Html->link($groupUser->group->group_name, ['controller' => 'Groups', 'action' => 'view', $groupUser->group->id]) : '' ?></td>
                <td><?= $groupUser->has('user') ? $this->Html->link($groupUser->user->first_name, ['controller' => 'Users', 'action' => 'view', $groupUser->user->id]) : '' ?></td>
                <td><?= $this->Number->format($groupUser->is_admin) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $groupUser->group_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $groupUser->group_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $groupUser->group_id], ['confirm' => __('Are you sure you want to delete # {0}?', $groupUser->group_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
