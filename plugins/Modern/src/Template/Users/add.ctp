<?php echo $this->assign('title', 'Add New User'); ?>

<?php echo $this->Form->create($user, array('controller' => 'users', 'action' => 'add'));?>
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
        <input name="profile[birthday]" type="text" class="form-control datepicker" placeholder="Date of birth">
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
    <?php echo $this->Form->input('profile.city', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'City', 'label' => false, 'required' => false]);?>
</div>

<div class="form-group">
    <label>Postal Code</label>
    <?php echo $this->Form->input('profile.postal_code', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Postal Code', 'label' => false, 'required' => false]);?>
</div>

<div class="form-group">
    <label>Password</label>
    <?php echo $this->Form->input('password', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'label' => false, 'required' => false]);?>
</div>

<div class="form-group">
    <label>Confirm password</label>
    <?php echo $this->Form->input('cPassword', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Confirm password', 'label' => false, 'required' => false]);?>
</div>

<button type="submit" class="btn btn-primary">Save User</button>
<?php echo $this->Form->end();?>



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













