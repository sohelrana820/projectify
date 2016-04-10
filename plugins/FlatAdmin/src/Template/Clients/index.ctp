<?php echo $this->assign('title', 'Clients List'); ?>

<div class="page-title">
    <span class="title">Clients List</span>
    <div class="description">All application clients</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <?php
                    echo $this->Html->link('New Client', ['controller' => 'clients', 'action' => 'add'], ['class' => 'btn btn-primary btn-theme', 'escape' => false]);
                    ?>
                </div>

            </div>
            <div class="card-body">
                <?php if(!$clients->isEmpty()):?>
                    <table class="table theme-table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Website</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($clients as $client):?>
                            <tr>
                                <td>
                                    <?php echo $this->Html->link($client->name, ['controller' => 'clients', 'action' => 'view', $client->id], ['class' => 'theme']); ?>
                                </td>
                                <td>
                                    <?php
                                    if($client->website)
                                    {
                                        echo '<a href="'.$client->website.'" target="_blank" class="theme">'.$client->website.'</a>';
                                    }
                                    else{
                                        echo 'N/A';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $client->email; ?>
                                </td>
                                <td>
                                    <?php
                                    if($client->phone)
                                    {
                                        echo $client->phone;
                                    }
                                    else{
                                        echo 'N/A';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($client->city)
                                    {
                                        echo $client->city;
                                    }
                                    else{
                                        echo 'N/A';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($client->status)
                                    {
                                        echo '<label class="green text-uppercase">Active</label>';
                                    }
                                    else{
                                        echo '<label class="red text-uppercase">Inactive</label>';
                                    }
                                    ?>
                                </td>
                                <td class="text-right">

                                    <?php
                                    echo $this->Html->link('<i class="fa fa-gear t-icon"></i>', ['controller' => 'clients', 'action' => 'view', $client->uuid], ['escape' => false, 'class' => 'green']);

                                    echo $this->Html->link('<i class="fa fa-pencil t-icon"></i>', ['controller' => 'clients', 'action' => 'edit', $client->uuid], ['escape' => false, 'class' => 'lblue']);

                                    echo $this->Html->link('<i class="fa fa-times t-icon"></i>',
                                        [
                                            'controller' => 'clients',
                                            'action' => 'delete',
                                            $client->id
                                        ],
                                        [
                                            'escape' => false,
                                            'class' => 'red',
                                            'confirm' => __('Are you sure you want to delete this client?', $client->id)
                                        ]
                                    );

                                    ?>

                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <div class="paginator pull-right">
                        <ul class="pagination">
                            <?php echo $this->Paginator->prev(__('«')) ?>
                            <?php echo $this->Paginator->numbers() ?>
                            <?php echo $this->Paginator->next(__('»')) ?>
                        </ul>
                        <p><?php echo $this->Paginator->counter() ?></p>
                    </div>
                <?php else:?>
                    <?php echo $this->element('not_found');?>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<?php $this->start('jsBottom'); ?>
<?php $this->end(); ?>
