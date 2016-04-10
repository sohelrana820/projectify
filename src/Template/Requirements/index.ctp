<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Requirement'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requirements index large-9 medium-8 columns content">
    <h3><?= __('Requirements') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('min_price') ?></th>
                <th><?= $this->Paginator->sort('max_price') ?></th>
                <th><?= $this->Paginator->sort('room') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requirements as $requirement): ?>
            <tr>
                <td><?= $this->Number->format($requirement->id) ?></td>
                <td><?= $this->Number->format($requirement->user_id) ?></td>
                <td><?= $this->Number->format($requirement->min_price) ?></td>
                <td><?= $this->Number->format($requirement->max_price) ?></td>
                <td><?= $this->Number->format($requirement->room) ?></td>
                <td><?= h($requirement->created) ?></td>
                <td><?= h($requirement->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $requirement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $requirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirement->id)]) ?>
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
