<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Schedule'), ['action' => 'edit', $schedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Schedule'), ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="schedules view large-9 medium-8 columns content">
    <h3><?= h($schedule->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Uuid') ?></th>
            <td><?= h($schedule->uuid) ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($schedule->title) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $schedule->has('user') ? $this->Html->link($schedule->user->id, ['controller' => 'Users', 'action' => 'view', $schedule->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Property') ?></th>
            <td><?= $schedule->has('property') ? $this->Html->link($schedule->property->id, ['controller' => 'Properties', 'action' => 'view', $schedule->property->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($schedule->id) ?></td>
        </tr>
        <tr>
            <th><?= __('User Id') ?></th>
            <td><?= $this->Number->format($schedule->user_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Agree') ?></th>
            <td><?= $this->Number->format($schedule->is_agree) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($schedule->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Start') ?></th>
            <td><?= h($schedule->start) ?></tr>
        </tr>
        <tr>
            <th><?= __('End') ?></th>
            <td><?= h($schedule->end) ?></tr>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($schedule->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($schedule->modified) ?></tr>
        </tr>
    </table>
</div>
