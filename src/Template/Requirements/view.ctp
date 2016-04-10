<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requirement'), ['action' => 'edit', $requirement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requirement'), ['action' => 'delete', $requirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requirements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requirements view large-9 medium-8 columns content">
    <h3><?= h($requirement->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($requirement->id) ?></td>
        </tr>
        <tr>
            <th><?= __('User Id') ?></th>
            <td><?= $this->Number->format($requirement->user_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Min Price') ?></th>
            <td><?= $this->Number->format($requirement->min_price) ?></td>
        </tr>
        <tr>
            <th><?= __('Max Price') ?></th>
            <td><?= $this->Number->format($requirement->max_price) ?></td>
        </tr>
        <tr>
            <th><?= __('Room') ?></th>
            <td><?= $this->Number->format($requirement->room) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($requirement->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($requirement->modified) ?></tr>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Type Ids') ?></h4>
        <?= $this->Text->autoParagraph(h($requirement->type_ids)); ?>
    </div>
    <div class="row">
        <h4><?= __('Category Ids') ?></h4>
        <?= $this->Text->autoParagraph(h($requirement->category_ids)); ?>
    </div>
</div>
