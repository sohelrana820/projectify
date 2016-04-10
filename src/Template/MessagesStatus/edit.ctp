<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $messagesStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $messagesStatus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Messages Status'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="messagesStatus form large-9 medium-8 columns content">
    <?= $this->Form->create($messagesStatus) ?>
    <fieldset>
        <legend><?= __('Edit Messages Status') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('message_id', ['options' => $messages]);
            echo $this->Form->input('is_read');
            echo $this->Form->input('marked_as');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
