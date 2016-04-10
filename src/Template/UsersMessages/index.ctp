<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Users Message'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersMessages index large-9 medium-8 columns content">
    <h3><?= __('Users Messages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('message_id') ?></th>
                <th><?= $this->Paginator->sort('role') ?></th>
                <th><?= $this->Paginator->sort('is_read') ?></th>
                <th><?= $this->Paginator->sort('marked_as') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usersMessages as $usersMessage): ?>
            <tr>
                <td><?= $this->Number->format($usersMessage->id) ?></td>
                <td><?= $usersMessage->has('user') ? $this->Html->link($usersMessage->user->id, ['controller' => 'Users', 'action' => 'view', $usersMessage->user->id]) : '' ?></td>
                <td><?= $usersMessage->has('message') ? $this->Html->link($usersMessage->message->id, ['controller' => 'Messages', 'action' => 'view', $usersMessage->message->id]) : '' ?></td>
                <td><?= $this->Number->format($usersMessage->role) ?></td>
                <td><?= $this->Number->format($usersMessage->is_read) ?></td>
                <td><?= $this->Number->format($usersMessage->marked_as) ?></td>
                <td><?= $this->Number->format($usersMessage->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usersMessage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersMessage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersMessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersMessage->id)]) ?>
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
