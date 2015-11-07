<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit College'), ['action' => 'edit', $college->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete College'), ['action' => 'delete', $college->id], ['confirm' => __('Are you sure you want to delete # {0}?', $college->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Colleges'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New College'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="colleges view large-9 medium-8 columns content">
    <h3><?= h($college->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('College Name') ?></th>
            <td><?= h($college->college_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($college->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Courses') ?></h4>
        <?php if (!empty($college->courses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Course Name') ?></th>
                <th><?= __('Course Code') ?></th>
                <th><?= __('College Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($college->courses as $courses): ?>
            <tr>
                <td><?= h($courses->id) ?></td>
                <td><?= h($courses->course_name) ?></td>
                <td><?= h($courses->course_code) ?></td>
                <td><?= h($courses->college_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Courses', 'action' => 'view', $courses->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Courses', 'action' => 'edit', $courses->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Courses', 'action' => 'delete', $courses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courses->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
