<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Requirements'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="requirements form large-9 medium-8 columns content">
    <?= $this->Form->create($requirement) ?>
    <fieldset>
        <legend><?= __('Add Requirement') ?></legend>
        <?php
            echo $this->Form->input('user_id');
            echo $this->Form->input('type_ids');
            echo $this->Form->input('category_ids');
            echo $this->Form->input('min_price');
            echo $this->Form->input('max_price');
            echo $this->Form->input('room');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
