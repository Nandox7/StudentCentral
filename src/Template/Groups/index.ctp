<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Create Group'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="groupUsers index large-9 medium-8 columns content">
    <h3><?= __('Groups List') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('group_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($myGroups as $group): ?>
            <tr>
                <td><?= $group->has('group') ? $this->Html->link($group->group->group_name, ['controller' => 'Groups', 'action' => 'view', $group->group->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $group->group_id]) ?>
                    
                    <?php  if($group->is_admin) { ?>
                    <?= $this->Html->link(__('Add User'), ['controller' => 'GroupUsers' ,'action' => 'add', $group->group_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $group->group_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $group->group_id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->group_id)]) ?>
                    
                    <?php }; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <?php if ($this->Paginator->counter(array('groups' => '%count%')) == 0) { ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
    <?php }; ?>
</div>
