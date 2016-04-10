<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Property'), ['action' => 'edit', $property->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Property'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="properties view large-9 medium-8 columns content">
    <h3><?= h($property->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $property->has('user') ? $this->Html->link($property->user->id, ['controller' => 'Users', 'action' => 'view', $property->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Image') ?></th>
            <td><?= h($property->image) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($property->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Faf After Repair Value') ?></th>
            <td><?= $this->Number->format($property->faf_after_repair_value) ?></td>
        </tr>
        <tr>
            <th><?= __('Faf Investor Price') ?></th>
            <td><?= $this->Number->format($property->faf_investor_price) ?></td>
        </tr>
        <tr>
            <th><?= __('Faf Closing Costs To Buy') ?></th>
            <td><?= $this->Number->format($property->faf_closing_costs_to_buy) ?></td>
        </tr>
        <tr>
            <th><?= __('Faf Rehab Projection') ?></th>
            <td><?= $this->Number->format($property->faf_rehab_projection) ?></td>
        </tr>
        <tr>
            <th><?= __('Faf Utilities') ?></th>
            <td><?= $this->Number->format($property->faf_utilities) ?></td>
        </tr>
        <tr>
            <th><?= __('Faf Closing Costs To Sell') ?></th>
            <td><?= $this->Number->format($property->faf_closing_costs_to_sell) ?></td>
        </tr>
        <tr>
            <th><?= __('Faf Listing Agent Commission') ?></th>
            <td><?= $this->Number->format($property->faf_listing_agent_commission) ?></td>
        </tr>
        <tr>
            <th><?= __('Faf Total Projected Profit') ?></th>
            <td><?= $this->Number->format($property->faf_total_projected_profit) ?></td>
        </tr>
        <tr>
            <th><?= __('Faf Estimated Roi') ?></th>
            <td><?= $this->Number->format($property->faf_estimated_roi) ?></td>
        </tr>
        <tr>
            <th><?= __('Rah Investor Price') ?></th>
            <td><?= $this->Number->format($property->rah_investor_price) ?></td>
        </tr>
        <tr>
            <th><?= __('Rah Closing Costs To Buy') ?></th>
            <td><?= $this->Number->format($property->rah_closing_costs_to_buy) ?></td>
        </tr>
        <tr>
            <th><?= __('Rah Rehab Projection') ?></th>
            <td><?= $this->Number->format($property->rah_rehab_projection) ?></td>
        </tr>
        <tr>
            <th><?= __('Rah Utilities') ?></th>
            <td><?= $this->Number->format($property->rah_utilities) ?></td>
        </tr>
        <tr>
            <th><?= __('Rah Property Insurance') ?></th>
            <td><?= $this->Number->format($property->rah_property_insurance) ?></td>
        </tr>
        <tr>
            <th><?= __('Rah Estimated Taxes') ?></th>
            <td><?= $this->Number->format($property->rah_estimated_taxes) ?></td>
        </tr>
        <tr>
            <th><?= __('Rah Property Management') ?></th>
            <td><?= $this->Number->format($property->rah_property_management) ?></td>
        </tr>
        <tr>
            <th><?= __('Rah Maintenance') ?></th>
            <td><?= $this->Number->format($property->rah_maintenance) ?></td>
        </tr>
        <tr>
            <th><?= __('Rah Hoa Dues') ?></th>
            <td><?= $this->Number->format($property->rah_hoa_dues) ?></td>
        </tr>
        <tr>
            <th><?= __('Rah Projected Income') ?></th>
            <td><?= $this->Number->format($property->rah_projected_income) ?></td>
        </tr>
        <tr>
            <th><?= __('Rah Estimated Apy') ?></th>
            <td><?= $this->Number->format($property->rah_estimated_apy) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($property->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($property->modified) ?></tr>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Galleries') ?></h4>
        <?= $this->Text->autoParagraph(h($property->galleries)); ?>
    </div>
</div>
