<?php echo $this->assign('title', 'Users List'); ?>

<div class="page-title">
    <span class="title">Users List</span>
    <div class="description">All application users</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?php if(!$users->isEmpty()):?>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <div class="title">Users</div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table theme-table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>City</th>
                            <th>Email Verified</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($users as $user):?>
                            <tr>
                                <td>
                                    <?php echo $this->Html->link($user->profile->name, ['controller' => 'users', 'action' => 'view', $user->id], ['class' => 'theme']); ?>
                                </td>
                                <td>
                                    <?php echo $user->username; ?>
                                </td>
                                <td>
                                    <?php
                                    if($user->profile->phone)
                                    {
                                        echo $user->profile->phone;
                                    }
                                    else{
                                        echo 'N/A';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php if($user->profile->gender == 1):?>
                                        <span>Male (<i class="fa fa-male blue"></i>)</span>
                                    <?php else:?>
                                        <span>Female (<i class="fa fa-female rose"></i>)</span>
                                    <?php endif;?>
                                </td>


                                <td>
                                    <?php
                                    if($user->profile->city)
                                    {
                                        echo $user->profile->city;
                                    }
                                    else{
                                        echo 'N/A';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($user->status)
                                    {
                                        echo '<label class="label label-success">Active</label>';
                                    }
                                    else{
                                        echo '<label class="label label-warning">Inactive</label>';
                                    }
                                    ?>
                                </td>
                                <td class="text-right">
                                    <?php
                                    echo $this->Html->link('<i class="fa fa-search"></i>', ['controller' => 'users', 'action' => 'view', $user->uuid], ['escape' => false, 'class' => 't-icon color-green']);
                                    ?>
                                    <?php
                                    echo $this->Html->link('<i class="fa fa-times"></i>',
                                        [
                                            'controller' => 'users',
                                            'action' => 'delete',
                                            $user->id
                                        ],
                                        [
                                            'escape' => false,
                                            'class' => 't-icon color-red',
                                            'confirm' => __('Are you sure you want to delete this user?', $user->id)
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
                </div>
            </div>
        <?php else:?>
            <?php echo $this->element('not_found');?>
        <?php endif;?>
    </div>
</div>
<?php $this->start('jsBottom'); ?>
<?php $this->end(); ?>
