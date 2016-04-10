<?php echo $this->assign('title', 'Edit User '); ?>

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

                    echo $this->Html->link('User Details', ['controller' => 'users', 'action' => 'view', $user->uuid], ['class' => 'btn btn-primary btn-theme', 'escape' => false]);

                    echo $this->Html->link('Delete User',
                        [
                            'controller' => 'users',
                            'action' => 'delete',
                            $user->id
                        ],
                        [
                            'escape' => false,
                            'class' => 'btn btn-danger btn-theme',
                            'confirm' => __('Are you sure you want to delete this user?', $user->id)
                        ]
                    );
                    ?>
                </div>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create($user, array('controller' => 'users', 'action' => 'edit/', $user->uuid));?>
                <form>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('profile.first_name', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'First name', 'label' => false, 'required' => false]);?>
                                <p class="help-text">Hints: First Name  <span class="red">(required)</span></p>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('profile.last_name', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Last name', 'label' => false, 'required' => false]);?>
                                <p class="help-text">Hints: Last Name <span class="red">(required)</span></p>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('profile.company_name', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Company name', 'label' => false, 'required' => false]);?>
                        <p class="help-text">Hints: Company Name <span class="red">(required)</span></p>

                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <input name="profile[birthday]" type="text" class="form-control datepicker" value="<?php echo $this->Time->format($user->profile->birthday, 'dd/MM/Y');?>">
                                </div>
                                <?php echo $this->Form->error('profile.birthday')?>
                                <p class="help-text">Hints: Birth Date </p>

                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <br/>
                                <div class="radio3 radio-check radio-success radio-inline">
                                    <input type="radio" id="radio5" name="profile[gender]" id="optionsRadios2" <?php if($user->profile->gender == 1){echo 'checked';}?> value="1" style="position: absolute; opacity: 0;">
                                    <label for="radio5">
                                        Male
                                    </label>
                                </div>
                                <div class="radio3 radio-check radio-success radio-inline">
                                    <input type="radio" id="radio6" name="profile[gender]" id="optionsRadios2" <?php if($user->profile->gender == 2){echo 'checked';}?> value="2" style="position: absolute; opacity: 0;">
                                    <label for="radio6">
                                        Female
                                    </label>
                                </div>
                                <p class="help-text">Hints: Gender</p>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <?php echo $this->Form->input('username', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Email address', 'label' => false, 'required' => false]);?>
                                <p class="help-text">Hints: Email Address <span class="red">(required)</span></p>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <?php echo $this->Form->input('profile.phone', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Phone number', 'label' => false, 'required' => false]);?>
                                <p class="help-text">Hints: Phone Number <span class="red">(required)</span></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <?php echo $this->Form->input('profile.fax', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Fax', 'label' => false, 'required' => false]);?>
                                <p class="help-text">Hints: Fax </p>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('profile.owned_properties', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Number of Owned Properties', 'label' => false, 'required' => false]);?>
                                <p class="help-text">Hints: Own Properties <span class="red">(required)</span></p>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('profile.investment_dollars', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Investment Dollars', 'label' => false, 'required' => false]);?>
                                <p class="help-text">Hints: Investment Dollar <span class="red">(required)</span></p>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select name="profile[year_inventing_type]" class="form-control select2">
                                    <option hidden value="">Choose Inventing Type</option>
                                    <option value="1" <?php echo ($user->profile->year_inventing_type == 1) ? 'selected' : '' ?>>Renting Out Properties</option>
                                    <option value="2" <?php echo ($user->profile->year_inventing_type == 2) ? 'selected' : '' ?>>Buying and Reselling Properties</option>
                                </select>
                                <?php echo $this->Form->error('profile.year_inventing_type')?>
                                <p class="help-text">Hints: Inventing Type <span class="red">(required)</span></p>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select name="role" class="form-control select2">
                                    <option hidden value="">Want  to be a</option>
                                    <option value="2" <?php echo ($user->role == 2) ? 'selected' : '' ?>>Seller</option>
                                    <option value="3" <?php echo ($user->role == 3) ? 'selected' : '' ?>>Investor</option>
                                </select>
                                <?php echo $this->Form->error('role')?>
                                <p class="help-text">Hints: Account Type <span class="red">(required)</span></p>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('profile.street_1', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Street 1', 'label' => false, 'required' => false]);?>
                                <p class="help-text">Hints: Address <span class="red">(required)</span></p>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('profile.street_2', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Street 2', 'label' => false, 'required' => false]);?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select id="country" name="profile[country]" class="form-control select2-form-control">
                                    <option><?php echo $user->profile->country;?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select name="profile[state]" id="state" class="form-control select2-form-control">
                                    <option><?php echo $user->profile->state;?></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('profile.city', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'City', 'label' => false, 'required' => false]);?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('profile.postal_code', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Postal Code', 'label' => false, 'required' => false]);?>
                            </div>
                        </div>
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