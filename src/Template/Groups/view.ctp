<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Group'), ['action' => 'edit', $group->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Group'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id)]) ?> </li>
    </ul>
</nav>
<div class="groups view large-9 medium-8 columns content">
    <h3><?= h($group->group_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Course') ?></th>
            <td><?= $group->has('course') ? $this->Html->link($group->course->course_name, ['controller' => 'Courses', 'action' => 'view', $group->course->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Group Name') ?></th>
            <td><?= h($group->group_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Group Details') ?></th>
            <td><?= h($group->group_details) ?></td>
        </tr>
    </table>
</div>
<div class="groupUsers index large-9 medium-8 columns content">
    <h3><?= __('Group Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('is_admin') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($groupUsers as $groupUser): 
                $full_name = $groupUser->user->first_name . " " . $groupUser->user->last_name;
            ?>
            <tr>
                <td><?= $groupUser->has('user') ? $this->Html->link($full_name, ['controller' => 'Users', 'action' => 'view', $groupUser->user->id]) : '' ?></td>
                <td><?= h($groupUser->is_admin ? "Yes" : "No") ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Remove'), ['controller' => 'GroupUsers', 'action' => 'delete', $groupUser->id], ['confirm' => __('Are you sure you want to remove {0}?', $full_name)]) ?>
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