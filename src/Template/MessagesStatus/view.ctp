<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Messages Status'), ['action' => 'edit', $messagesStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Messages Status'), ['action' => 'delete', $messagesStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $messagesStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Messages Status'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Messages Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="messagesStatus view large-9 medium-8 columns content">
    <h3><?= h($messagesStatus->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $messagesStatus->has('user') ? $this->Html->link($messagesStatus->user->id, ['controller' => 'Users', 'action' => 'view', $messagesStatus->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Message') ?></th>
            <td><?= $messagesStatus->has('message') ? $this->Html->link($messagesStatus->message->id, ['controller' => 'Messages', 'action' => 'view', $messagesStatus->message->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($messagesStatus->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Read') ?></th>
            <td><?= $this->Number->format($messagesStatus->is_read) ?></td>
        </tr>
        <tr>
            <th><?= __('Marked As') ?></th>
            <td><?= $this->Number->format($messagesStatus->marked_as) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($messagesStatus->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($messagesStatus->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($messagesStatus->modified) ?></tr>
        </tr>
    </table>
</div>
