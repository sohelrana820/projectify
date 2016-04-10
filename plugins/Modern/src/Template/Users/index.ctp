<?php echo $this->assign('title', 'Users List'); ?>


<?php if(!$users->isEmpty()):?>
    <table class="table theme-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Street</th>
            <th>City</th>
            <th>State</th>
            <th>Postal Code</th>
            <th class="text-right">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($users as $user):?>
            <tr>
                <td>
                    <?php echo $this->Html->link($user->profile->name, ['controller' => 'users', 'action' => 'view', $user->id]); ?>
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
                        <span class="g-male">Male (<i class="fa fa-male"></i>)</span>
                    <?php else:?>
                        <span class="g-female">Female (<i class="fa fa-female"></i>)</span>
                    <?php endif;?>
                </td>

                <td>
                    <?php
                    if($user->profile->street_1)
                    {
                        echo $user->profile->street_1;
                    }
                    elseif($user->profile->street_2)
                    {
                        echo $user->profile->street_2;
                    }
                    else{
                        echo 'N/A';
                    }
                    ?>
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
                    if($user->profile->state && $user->profile->state != 'Choose state')
                    {
                        echo $user->profile->state;
                    }
                    else{
                        echo 'N/A';
                    }
                    ?>
                </td>

                <td>
                    <?php
                    if($user->profile->postal_code)
                    {
                        echo $user->profile->postal_code;
                    }
                    else{
                        echo 'N/A';
                    }
                    ?>
                </td>

                <td class="text-right">
                    <?php
                    echo $this->Html->link('<i class="fa fa-search"></i>', ['controller' => 'users', 'action' => 'view', $user->uuid], ['escape' => false, 'class' => 't-icon color-green']);
                    echo $this->Html->link('<i class="fa fa-remove"></i>', ['controller' => 'users', 'action' => 'view', $user->uuid], ['escape' => false, 'class' => 't-icon color-red']);
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