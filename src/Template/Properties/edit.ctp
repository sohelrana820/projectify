<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $property->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="properties form large-9 medium-8 columns content">
    <?= $this->Form->create($property) ?>
    <fieldset>
        <legend><?= __('Edit Property') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('faf_after_repair_value');
            echo $this->Form->input('faf_investor_price');
            echo $this->Form->input('faf_closing_costs_to_buy');
            echo $this->Form->input('faf_rehab_projection');
            echo $this->Form->input('faf_utilities');
            echo $this->Form->input('faf_closing_costs_to_sell');
            echo $this->Form->input('faf_listing_agent_commission');
            echo $this->Form->input('faf_total_projected_profit');
            echo $this->Form->input('faf_estimated_roi');
            echo $this->Form->input('rah_investor_price');
            echo $this->Form->input('rah_closing_costs_to_buy');
            echo $this->Form->input('rah_rehab_projection');
            echo $this->Form->input('rah_utilities');
            echo $this->Form->input('rah_property_insurance');
            echo $this->Form->input('rah_estimated_taxes');
            echo $this->Form->input('rah_property_management');
            echo $this->Form->input('rah_maintenance');
            echo $this->Form->input('rah_hoa_dues');
            echo $this->Form->input('rah_projected_income');
            echo $this->Form->input('rah_estimated_apy');
            echo $this->Form->input('image');
            echo $this->Form->input('galleries');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
