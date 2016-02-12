<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clients view large-9 medium-8 columns content">
    <h3><?= h($client->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($client->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Website') ?></th>
            <td><?= h($client->website) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($client->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($client->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Fax') ?></th>
            <td><?= h($client->fax) ?></td>
        </tr>
        <tr>
            <th><?= __('Street 1') ?></th>
            <td><?= h($client->street_1) ?></td>
        </tr>
        <tr>
            <th><?= __('Street 2') ?></th>
            <td><?= h($client->street_2) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($client->city) ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= h($client->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Postal Code') ?></th>
            <td><?= h($client->postal_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($client->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($client->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Uuid') ?></th>
            <td><?= $this->Number->format($client->uuid) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($client->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($client->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($client->modified) ?></tr>
        </tr>
    </table>
</div>
