<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Messages Status'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="messagesStatus index large-9 medium-8 columns content">
    <h3><?= __('Messages Status') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('message_id') ?></th>
                <th><?= $this->Paginator->sort('is_read') ?></th>
                <th><?= $this->Paginator->sort('marked_as') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messagesStatus as $messagesStatus): ?>
            <tr>
                <td><?= $this->Number->format($messagesStatus->id) ?></td>
                <td><?= $messagesStatus->has('user') ? $this->Html->link($messagesStatus->user->id, ['controller' => 'Users', 'action' => 'view', $messagesStatus->user->id]) : '' ?></td>
                <td><?= $messagesStatus->has('message') ? $this->Html->link($messagesStatus->message->id, ['controller' => 'Messages', 'action' => 'view', $messagesStatus->message->id]) : '' ?></td>
                <td><?= $this->Number->format($messagesStatus->is_read) ?></td>
                <td><?= $this->Number->format($messagesStatus->marked_as) ?></td>
                <td><?= $this->Number->format($messagesStatus->status) ?></td>
                <td><?= h($messagesStatus->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $messagesStatus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $messagesStatus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $messagesStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $messagesStatus->id)]) ?>
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
