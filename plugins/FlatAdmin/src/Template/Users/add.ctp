<?php echo $this->assign('title', 'New User'); ?>

    <div class="page-title">
        <span class="title">Add New User</span>
        <div class="description">Provide all information for adding new user</div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <?php
                        echo $this->Html->link('Users List', ['controller' => 'users', 'action' => 'index'], ['class' => 'btn btn-primary btn-theme', 'escape' => false]);
                        ?>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo $this->Form->create($user, array('controller' => 'users', 'action' => 'add')); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">First name</label>
                                <?php echo $this->Form->input('profile.first_name', ['type' => 'text', 'class' => 'form-control',  'label' => false, 'required' => false]); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Last name</label>
                                <?php echo $this->Form->input('profile.last_name', ['type' => 'text', 'class' => 'form-control',  'label' => false, 'required' => false]); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group label-floating is-empty">
                                <div class="input-group">
                                    <label class="control-label">Date of birth</label>
                                    <input name="profile[birthday]" type="text" class="form-control datepicker">
                                </div>
                                <?php echo $this->Form->error('profile.birthday') ?>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group label-floating is-empty">
                                <h4>Gender</h4>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="profile[gender]" value="1" checked="">
                                        <span class="circle"></span><span class="check"></span>
                                        Always
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="profile[gender]" value="2">
                                        <span class="circle"></span><span class="check"></span>
                                        Only when plugged in
                                    </label>
                                </div>
                                <?php echo $this->Form->error('profile.gender') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Username (email address)</label>
                                <?php echo $this->Form->input('username', ['type' => 'text', 'class' => 'form-control', 'label' => false, 'required' => false]); ?>
                                <p class="help-text">Hints: Email Address <span class="red">(required)</span></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Phone number</label>
                                <?php echo $this->Form->input('profile.phone', ['type' => 'text', 'class' => 'form-control', 'label' => false, 'required' => false]); ?>
                                <p class="help-text">Hints: Phone Number <span class="red">(required)</span></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Fax</label>
                                <?php echo $this->Form->input('profile.fax', ['type' => 'text', 'class' => 'form-control', 'label' => false, 'required' => false]); ?>
                                <p class="help-text">Hints: Fax </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Street 1</label>
                                <?php echo $this->Form->input('profile.street_1', ['type' => 'text', 'class' => 'form-control', 'label' => false, 'required' => false]); ?>
                                <p class="help-text">Hints: Address <span class="red">(required)</span></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Street 2 (optional)</label>
                                <?php echo $this->Form->input('profile.street_2', ['type' => 'text', 'class' => 'form-control', 'label' => false, 'required' => false]); ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">City</label>
                                <?php echo $this->Form->input('profile.city', ['type' => 'text', 'class' => 'form-control', 'label' => false, 'required' => false]); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group label-floating is-empty">
                                <select id="country" name="profile[country]" class="form-control select2-form-control select2">
                                    <option value="">Choose country</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group label-floating is-empty">
                                <select name="profile[state]" id="state" class="form-control select2-form-control select2">
                                    <option value="" hidden>Choose state</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Postal Code</label>
                                <?php echo $this->Form->input('profile.postal_code', ['type' => 'text', 'class' => 'form-control', 'label' => false, 'required' => false]); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Password</label>
                                <?php echo $this->Form->input('password', ['type' => 'password', 'class' => 'form-control', 'label' => false, 'required' => false]); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label">Confirm password</label>
                                <?php echo $this->Form->input('cPassword', ['type' => 'password', 'class' => 'form-control', 'label' => false, 'required' => false]); ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save User</button>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>

<?php
$this->start('cssTop');
echo $this->Html->css(array('select2.min', 'datepicker', 'all'));
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