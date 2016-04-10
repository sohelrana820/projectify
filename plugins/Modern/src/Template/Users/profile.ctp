<div class="container" style="padding-top: 60px;">
    <h1 class="page-header">My Profile</h1>
    <div class="row">
        <!-- left column -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="text-center">
                <img src="http://lorempixel.com/200/200/people/9/" class="avatar img-circle img-thumbnail" alt="avatar">
                <h6>Upload a different photo...</h6>
                <input type="file" class="text-center center-block well well-sm">
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
            <?php echo $this->Form->create(null, array('controller' => 'users', 'action' => 'profile'));?>


                <div class="form-group">
                    <label>First name</label>
                    <?php echo $this->Form->input('profile.first_name', ['type' => 'text', 'class' => 'form-control', 'value' => $userInfo->profile->first_name, 'label' => false, 'required' => false]);?>
                </div>

                <div class="form-group">
                    <label>Last name</label>
                    <?php echo $this->Form->input('profile.last_name', ['type' => 'text', 'class' => 'form-control', 'value' => $userInfo->profile->last_name, 'label' => false, 'required' => false]);?>
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="profile[gender]" value="1">Male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="profile[gender]" value="2">Female
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Date of Birth</label>
                    <div class="input-group">
                        <input name="profile[birthday]" type="text" class="form-control datepicker" value=<?php echo $userInfo->profile->birthday;?>>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>

                <div class="form-group">
                    <label>Email address</label>
                    <?php echo $this->Form->input('email', ['type' => 'text', 'class' => 'form-control', 'value' => $userInfo->username, 'label' => false, 'required' => false, 'readonly' => true]);?>
                </div>

                <div class="form-group">
                    <label>Phone number</label>
                    <?php echo $this->Form->input('profile.phone', ['type' => 'text', 'class' => 'form-control', 'value' => $userInfo->profile->phone, 'label' => false, 'required' => false]);?>
                </div>

                <div class="form-group">
                    <label>Fax</label>
                    <?php echo $this->Form->input('profile.fax', ['type' => 'text', 'class' => 'form-control', 'value' => $userInfo->profile->fax, 'label' => false, 'required' => false]);?>
                </div>

                <div class="form-group">
                    <label>Street 1</label>
                    <?php echo $this->Form->input('profile.street_1', ['type' => 'text', 'class' => 'form-control', 'value' => $userInfo->profile->street_1, 'label' => false, 'required' => false]);?>
                </div>

                <div class="form-group">
                    <label>Street 2</label>
                    <?php echo $this->Form->input('profile.street_2', ['type' => 'text', 'class' => 'form-control', 'value' => $userInfo->profile->street_2, 'label' => false, 'required' => false]);?>
                </div>

                <div class="form-group">
                    <label>Country</label>
                    <select id="country" name="profile[country]" class="form-control select2-form-control">
                        <option>Choose country</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>State</label>
                    <select name="profile[state]" id="state" class="form-control select2-form-control">
                        <option>Choose state</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>City</label>
                    <?php echo $this->Form->input('profile.city', ['type' => 'text', 'class' => 'form-control', 'value' => $userInfo->profile->city, 'label' => false, 'required' => false]);?>
                </div>

                <div class="form-group">
                    <label>Postal Code</label>
                    <?php echo $this->Form->input('profile.postal_code', ['type' => 'text', 'class' => 'form-control', 'value' => $userInfo->profile->postal_code, 'label' => false, 'required' => false]);?>
                </div>

                <div class="form-group">
                    <div class="col-md-8">
                        <input class="btn btn-primary" value="Save Changes" type="submit">
                        <span></span>
                        <input class="btn btn-default" value="Cancel" type="reset">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$this->start('cssTop');
echo $this->Html->css(array('select2.min', 'datepicker'));
$this->end();

$this->start('jsTop');
echo $this->Html->script(array('country'));
$this->end();

$this->start('jsBottom');
echo $this->Html->script(['select2.full.min', 'datepicker']);
?>

<script language="javascript">
    populateCountries("country", "state");
    $('.datepicker').datepicker();
</script>

<?php $this->end(); ?>