<?php
use Cake\Utility\Inflector;
echo $this->assign('title', 'Users List');
?>

<div class="page-title">
    <span class="title">
    <?php
    echo $this->Html->link('Users List' , [
        'controller' => 'User',
        'action' => 'index'
    ])
    ?>
    </span>



    <div class="description">
        <?php echo $this->Paginator->counter(
            'showing {{current}} records out of
     {{count}} total'
        ); ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">Quick Navigation <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <?php
                                echo $this->Html->link(
                                    'All (' . $data['totalUser'] . ')',
                                    ['controller' => 'Users', 'action' => 'index']
                                );
                                ?>
                            </li>
                            <?php foreach ($data['userOverview'] as $userOverview): ?>
                                <li>
                                    <?php
                                    echo $this->Html->link(
                                        Inflector::humanize($userOverview['roleName']) . '(' . $userOverview['count'] . ')',
                                        [
                                            'controller' => 'Users',
                                            'action' => 'index',
                                            $userOverview['roleName']
                                        ]
                                    );
                                    ?>

                                </li>

                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#searchUserModal">
                        Search
                    </button>
                    <?php
                    echo $this->Html->link('New User', ['controller' => 'users', 'action' => 'add'], ['class' => 'btn btn-primary btn-theme', 'escape' => false]);
                    ?>
                </div>

            </div>
            <div class="card-body">
                <?php if (!$users->isEmpty()): ?>
                    <table class="table theme-table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Account Type</th>
                            <th>Status</th>
                            <th>Verified</th>
                            <th>City</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($users as $user): ?>
                            <tr>
                                <td>
                                    <?php echo $this->Html->link($user->profile->name,
                                        [
                                            'controller' => 'users',
                                            'action' => 'view', $user->uuid
                                        ],
                                        [
                                            'class' => 'theme'
                                        ]
                                    );
                                    ?>
                                </td>
                                <td>
                                    <?php echo $user->username; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($user->profile->phone) {
                                        echo $user->profile->phone;
                                    } else {
                                        echo 'N/A';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($user->role == 1) {
                                        echo "Admin";
                                    } elseif ($user->role == 2) {
                                        echo "Seller";
                                    } elseif ($user->role == 3) {
                                        echo "Investor";
                                    } else {
                                        echo 'N/A';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($user->status) {
                                        echo '<label class="green text-uppercase">Active</label>';
                                    } else {
                                        echo '<label class="red text-uppercase">Inactive</label>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($user->email_verify == 1) {
                                        echo '<label class="green text-uppercase">Yes</label>';
                                    } else {
                                        echo '<label class="red text-uppercase">No</label>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($user->profile->city) {
                                        echo $user->profile->city;
                                    } else {
                                        echo 'N/A';
                                    }
                                    ?>
                                </td>
                                <td class="text-right">

                                    <?php
                                    echo $this->Html->link('<i class="fa fa-gear t-icon"></i>',
                                        [
                                            'controller' => 'users',
                                            'action' => 'view',
                                            $user->uuid
                                        ],
                                        [
                                            'escape' => false,
                                            'class' => 'green'
                                        ]
                                    );

                                    if ($user->role == 2 || $user->role == 3) {
                                        echo $this->Html->link('<i class="fa fa-pencil t-icon"></i>',
                                            [
                                                'controller' => 'users',
                                                'action' => 'edit',
                                                $user->uuid
                                            ],
                                            [
                                                'escape' => false,
                                                'class' => 'lblue'
                                            ]);
                                        echo $this->Html->link('<i class="fa fa-times t-icon"></i>',
                                            [
                                                'controller' => 'users',
                                                'action' => 'delete',
                                                $user->id
                                            ],
                                            [
                                                'escape' => false,
                                                'class' => 'red',
                                                'confirm' => __('Are you sure you want to delete this user?', $user->id)
                                            ]
                                        );
                                    } else {
                                        echo '<span class="lblue"><i class="fa fa-pencil t-icon"></i></span>';
                                        echo '<span class="red"><i class="fa fa-times t-icon"></i></span>';
                                    }

                                    ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
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
                <?php else: ?>
                    <?php echo $this->element('not_found'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $this->start('jsBottom'); ?>
<?php $this->end(); ?>


<div class="modal fade modal-primary" id="searchUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <?php
        echo $this->Form->create(null,
            [
                'type' => 'get',
                'url' =>
                    [
                        'controller' => 'Users',
                        'action' => 'index',
                    ]
            ]
        );
        ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                <h4 class="modal-title text-center text-uppercase" id="myModalLabel">Search User</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="input text">
                        <input type="text"
                               name="email"
                               class="form-control"
                               placeholder="User Email"
                               value="<?php echo $this->request->query('email') != '' ? $this->request->query('email') : '' ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input text">
                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="User Name"
                               value="<?php echo $this->request->query('name') != '' ? $this->request->query('name') : '' ?>">

                    </div>
                </div>
                <div class="form-group">
                    <label for="">User Status</label>
                    <br>

                    <div class="radio3 radio-check radio-success radio-inline">
                        <input type="radio" id="radio5" name="status" id="optionsRadios2" value="1"
                               style="position: absolute; opacity: 0;">
                        <label for="radio5">
                            Active
                        </label>
                    </div>
                    <div class="radio3 radio-check radio-success radio-inline">
                        <input type="radio" id="radio6" name="status" id="optionsRadios2" value="0"
                               style="position: absolute; opacity: 0;">
                        <label for="radio6">
                            Inactive
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Email Verified</label>
                    <br>

                    <div class="radio3 radio-check radio-success radio-inline">
                        <input type="radio" id="verify1" name="email_verify" id="optionsRadios2" value="1"
                               style="position: absolute; opacity: 0;">
                        <label for="verify1">
                            Yes
                        </label>
                    </div>
                    <div class="radio3 radio-check radio-success radio-inline">
                        <input type="radio" id="verify0" name="email_verify" id="optionsRadios2" value="0"
                               style="position: absolute; opacity: 0;">
                        <label for="verify0">
                            No
                        </label>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="search">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        </form>
    </div>
</div>