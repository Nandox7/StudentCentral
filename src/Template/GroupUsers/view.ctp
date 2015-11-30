<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Group User'), ['action' => 'edit', $groupUser->group_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Group User'), ['action' => 'delete', $groupUser->group_id], ['confirm' => __('Are you sure you want to delete # {0}?', $groupUser->group_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Group Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="groupUsers view large-9 medium-8 columns content">
    <h3><?= h($groupUser->group_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Group') ?></th>
            <td><?= $groupUser->has('group') ? $this->Html->link($groupUser->group->group_name, ['controller' => 'Groups', 'action' => 'view', $groupUser->group->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $groupUser->has('user') ? $this->Html->link($groupUser->user->first_name, ['controller' => 'Users', 'action' => 'view', $groupUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($groupUser->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Admin') ?></th>
            <td><?= $this->Number->format($groupUser->is_admin) ?></td>
        </tr>
    </table>
</div>
