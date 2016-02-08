<?php echo $this->assign('title', 'Add New User'); ?>

<div class="page-title">
    <span class="title">Edit User</span>
    <div class="description">Provide all information for editing user</div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <?php
                    echo $this->Html->link('New User', ['controller' => 'users', 'action' => 'add'], ['class' => 'btn btn-primary btn-theme', 'escape' => false]);

                    echo $this->Html->link('Users List', ['controller' => 'users', 'action' => 'index'], ['class' => 'btn btn-primary btn-theme', 'escape' => false]);

                    echo $this->Html->link('Delete User',
                        [
                            'controller' => 'users',
                            'action' => 'delete',
                            $userInfo->id
                        ],
                        [
                            'escape' => false,
                            'class' => 'btn btn-danger btn-theme',
                            'confirm' => __('Are you sure you want to delete this user?', $userInfo->id)
                        ]
                    );
                    ?>
                </div>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create($userInfo, array('controller' => 'users', 'action' => 'edit/', $userInfo->uuid));?>
                <form>

                    <div class="form-group">
                        <label>First name</label>
                        <?php echo $this->Form->input('profile.first_name', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'First name', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Last name</label>
                        <?php echo $this->Form->input('profile.last_name', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Last name', 'label' => false, 'required' => false]);?>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <br/>
                        <div class="radio3 radio-check radio-success radio-inline">
                            <input type="radio" id="radio5" name="profile[gender]" id="optionsRadios2" <?php if($userInfo->profile->gender == 1){echo 'checked';}?> value="1" style="position: absolute; opacity: 0;">
                            <label for="radio5">
                                Male
                            </label>
                        </div>
                        <div class="radio3 radio-check radio-success radio-inline">
                            <input type="radio" id="radio6" name="profile[gender]" id="optionsRadios2" <?php if($userInfo->profile->gender == 2){echo 'checked';}?> value="2" style="position: absolute; opacity: 0;">
                            <label for="radio6">
                                Female
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <div class="input-group">
                            <input name="profile[birthday]" type="text" class="form-control datepicker" value="<?php echo $this->Time->format($userInfo->profile->birthday, 'dd/MM/Y');?>">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email address</label>
                        <?php echo $this->Form->input('username', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Email address', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Phone number</label>
                        <?php echo $this->Form->input('profile.phone', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Phone number', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Fax</label>
                        <?php echo $this->Form->input('profile.fax', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Fax', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Street 1</label>
                        <?php echo $this->Form->input('profile.street_1', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Street 1', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Street 2</label>
                        <?php echo $this->Form->input('profile.street_2', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Street 2', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Country</label>
                        <select id="country" name="profile[country]" class="form-control select2-form-control">
                            <option><?php echo $userInfo->profile->country;?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>State</label>
                        <select name="profile[state]" id="state" class="form-control select2-form-control">
                            <option><?php echo $userInfo->profile->state;?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>City</label>
                        <?php echo $this->Form->input('profile.city', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'City', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Postal Code</label>
                        <?php echo $this->Form->input('profile.postal_code', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Postal Code', 'label' => false, 'required' => false]);?>
                    </div>

                    <button type="submit" class="btn btn-primary">Edit User</button>
                    <?php echo $this->Form->end();?>
            </div>
        </div>
    </div>
</div>



<?php
$this->start('cssTop');
echo $this->Html->css(array('select2.min', 'datepicker','all'));
$this->end();

$this->start('jsTop');
echo $this->Html->script(array('country'));
$this->end();

$this->start('jsBottom');
echo $this->Html->script(['select2.full.min', 'datepicker']);
?>

<script language="javascript">
    populateCountries("country", "state");
</script>

<?php $this->end(); ?>