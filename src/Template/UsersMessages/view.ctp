<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Message'), ['action' => 'edit', $usersMessage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Message'), ['action' => 'delete', $usersMessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersMessage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Message'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersMessages view large-9 medium-8 columns content">
    <h3><?= h($usersMessage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $usersMessage->has('user') ? $this->Html->link($usersMessage->user->id, ['controller' => 'Users', 'action' => 'view', $usersMessage->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Message') ?></th>
            <td><?= $usersMessage->has('message') ? $this->Html->link($usersMessage->message->id, ['controller' => 'Messages', 'action' => 'view', $usersMessage->message->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersMessage->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Role') ?></th>
            <td><?= $this->Number->format($usersMessage->role) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Read') ?></th>
            <td><?= $this->Number->format($usersMessage->is_read) ?></td>
        </tr>
        <tr>
            <th><?= __('Marked As') ?></th>
            <td><?= $this->Number->format($usersMessage->marked_as) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($usersMessage->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($usersMessage->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($usersMessage->modified) ?></tr>
        </tr>
    </table>
</div>
