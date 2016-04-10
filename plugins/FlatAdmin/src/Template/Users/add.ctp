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

                    <div class="form-group label-floating is-empty">
                        <label for="i5" class="control-label">First name</label>
                        <input type="text" name="profile[first_name]" class="form-control" placeholder="First name" maxlength="32" id="profile-first-name">
                        <span class="help-block">This is a hint as a <code>span.help-block.hint</code></span>
                        <span class="material-input"></span></div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('profile.first_name', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'First name', 'label' => false, 'required' => false]); ?>
                            </div>
                            <p class="help-text">Hints: First Name  <span class="red">(required)</span></p>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('profile.last_name', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Last name', 'label' => false, 'required' => false]); ?>
                            </div>
                            <p class="help-text">Hints: Last Name <span class="red">(required)</span></p>

                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('profile.company_name', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Company name', 'label' => false, 'required' => false]); ?>
                        <p class="help-text">Hints: Company Name <span class="red">(required)</span></p>

                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <input name="profile[birthday]" type="text" class="form-control datepicker"
                                           placeholder="Date of birth">

                                </div>
                                <?php echo $this->Form->error('profile.birthday') ?>
                                <p class="help-text">Hints: Birth Date </p>

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <br/>

                                <div class="radio3 radio-check radio-success radio-inline">
                                    <input type="radio" id="radio5" name="profile[gender]" id="optionsRadios2" value="1"
                                           style="position: absolute; opacity: 0;">
                                    <label for="radio5">
                                        Male
                                    </label>
                                </div>
                                <div class="radio3 radio-check radio-success radio-inline">
                                    <input type="radio" id="radio6" name="profile[gender]" id="optionsRadios2" value="2"
                                           style="position: absolute; opacity: 0;">
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
                                <?php echo $this->Form->input('username', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Email address', 'label' => false, 'required' => false]); ?>
                                <p class="help-text">Hints: Email Address <span class="red">(required)</span></p>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <?php echo $this->Form->input('profile.phone', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Phone number', 'label' => false, 'required' => false]); ?>
                                <p class="help-text">Hints: Phone Number <span class="red">(required)</span></p>

                            </div>
                        </div>
                        <div class="col-lg-4">


                            <div class="form-group">
                                <?php echo $this->Form->input('profile.fax', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Fax', 'label' => false, 'required' => false]); ?>

                                <p class="help-text">Hints: Fax </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('profile.owned_properties', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Number of Owned Properties', 'label' => false, 'required' => false]); ?>
                                <p class="help-text">Hints: Own Properties <span class="red">(required)</span></p>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('profile.investment_dollars', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Investment Dollars', 'label' => false, 'required' => false]); ?>
                                <p class="help-text">Hints: Investment Dollar <span class="red">(required)</span></p>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select name="profile[year_inventing_type]" class="form-control select2">
                                    <option hidden value="" selected>Choose Inventing Type</option>
                                    <option value="1">Renting Out Properties</option>
                                    <option value="2">Buying and Reselling Properties</option>
                                </select>
                                <?php echo $this->Form->error('profile.year_inventing_type') ?>
                                <p class="help-text">Hints: Inventing Type <span class="red">(required)</span></p>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select name="role" class="form-control select2">
                                    <option hidden value="" selected>Want to be a</option>
                                    <option value="2">Seller</option>
                                    <option value="3">Investor</option>
                                </select>
                                <?php echo $this->Form->error('role') ?>
                                <p class="help-text">Hints: Account Type <span class="red">(required)</span></p>

                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <?php echo $this->Form->input('profile.street_1', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Street 1', 'label' => false, 'required' => false]); ?>
                        <p class="help-text">Hints: Address <span class="red">(required)</span></p>

                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('profile.street_2', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Street 2', 'label' => false, 'required' => false]); ?>
                    </div>

                    <div class="form-group">
                        <select id="country" name="profile[country]" class="form-control select2-form-control select2">
                            <option value="">Choose country</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="profile[state]" id="state" class="form-control select2-form-control select2">
                            <option value="" hidden>Choose state</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('profile.city', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'City', 'label' => false, 'required' => false]); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('profile.postal_code', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Postal Code', 'label' => false, 'required' => false]); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('password', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'label' => false, 'required' => false]); ?>
                        <p class="help-text">Hints: Password <span class="red">(required)</span></p>

                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('cPassword', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Confirm password', 'label' => false, 'required' => false]); ?>
                        <p class="help-text">Hints: Password Confirm <span class="red">(required)</span></p>

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