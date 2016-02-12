<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="clients form large-9 medium-8 columns content">
    <?= $this->Form->create($client) ?>
    <fieldset>
        <legend><?= __('Add Client') ?></legend>
        <?php
            echo $this->Form->input('uuid');
            echo $this->Form->input('created_by');
            echo $this->Form->input('name');
            echo $this->Form->input('website');
            echo $this->Form->input('email');
            echo $this->Form->input('phone');
            echo $this->Form->input('fax');
            echo $this->Form->input('street_1');
            echo $this->Form->input('street_2');
            echo $this->Form->input('city');
            echo $this->Form->input('state');
            echo $this->Form->input('postal_code');
            echo $this->Form->input('country');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
