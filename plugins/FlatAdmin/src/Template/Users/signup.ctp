<?php echo $this->assign('title', 'Signup'); ?>

<div class="login-body">


    <div class="login_title">
        <h4 class="divider">Create Account</h4>
        <hr/>
    </div>

    <?php echo $this->Form->create(
        $user,
        array('controller' => 'users', 'action' => 'signup', 'class' => 'login_form')
    );
    ?>

    <div class="row">
        <div class="control">
            <div class="col-md-6">
                <?php echo $this->Form->input(
                    'profile.first_name',
                    [
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'First name',
                        'label' => false,
                        'required' => false
                    ]
                ); ?>
            </div>
            <div class="col-md-6">
                <?php echo $this->Form->input(
                    'profile.last_name',
                    [
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'Last name',
                        'label' => false,
                        'required' => false
                    ]
                ); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="control">
            <div class="col-md-12">
                <?php echo $this->Form->input(
                    'profile.company_name',
                    [
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'Company name',
                        'label' => false,
                        'required' => false
                    ]
                ); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="control">
            <div class="col-md-12">
                <?php echo $this->Form->input(
                    'username',
                    [
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'Email address',
                        'label' => false,
                        'required' => false
                    ]
                ); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="control">
            <div class="col-md-6">
                <?php echo $this->Form->input(
                    'profile.phone',
                    [
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'Phone number',
                        'label' => false,
                        'required' => false
                    ]
                ); ?>
            </div>
            <div class="col-md-6">
                <?php echo $this->Form->input(
                    'profile.birthday',
                    [
                        'type' => 'text',
                        'class' => 'form-control datepicker',
                        'placeholder' => 'Birthday',
                        'label' => false,
                        'required' => false
                    ]
                ); ?>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="control">
            <div class="col-md-12">

                <select name="role" class="form-control" id="role">
                    <option hidden value=""> Want to be a</option>
                    <option value="2">Seller</option>
                    <option value="3">Investor</option>
                </select>

                <?php echo $this->Form->error('role') ?>
            </div>
        </div>
    </div>

    <?php
    $style = 'display: none;';
    if($this->Form->error('profile.owned_properties') && $this->Form->error('profile.owned_properties') != '')
    {
        $style = '';
    }
    ?>
    <div class="row" id="ownProperties" style="<?php echo $style;?>">
        <div class="control">
            <div class="col-md-12">
                <?php echo $this->Form->input(
                    'profile.owned_properties',
                    [
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'No. of owned properties',
                        'label' => false,
                        'required' => false,
                        //'error' => ['test error', ['class' => 'custom_class1']]
                    ]
                ); ?>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="control">
            <?php
            $style = 'display: none;';
            if($this->Form->error('profile.investment_dollars') && $this->Form->error('profile.investment_dollars') != '')
            {
                $style = '';
            }
            ?>
            <div class="col-md-6 investmentDollar" style="<?php echo $style;?>">
                <?php echo $this->Form->input(
                    'profile.investment_dollars',
                    [
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'Investment dollars',
                        'label' => false,
                        'required' => false,
                        'error' => ['id' => 'custom_111']
                    ]
                ); ?>
            </div>

            <?php
            $style = 'display: none;';
            if($this->Form->error('profile.year_inventing_type') && $this->Form->error('profile.year_inventing_type') != '')
            {
                $style = '';
            }
            ?>
            <div class="col-md-6 investmentDollarType" style="<?php echo $style;?>">
                <select name="profile[year_inventing_type]" class="form-control" id="year_inventing_type">
                    <option hidden value="" selected>Choose inventing type</option>
                    <option value="1">Renting Out Properties</option>
                    <option value="2">Buying and Reselling Properties</option>
                </select>
                <?php echo $this->Form->error('profile.year_inventing_type' , null, ['class' => 'custom_error']) ?>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="control">
            <div class="col-md-12">
                <?php echo $this->Form->input(
                    'profile.street_1',
                    [
                        'type' => 'text',
                        'class' => 'form-control',
                        'placeholder' => 'Street address',
                        'label' => false,
                        'required' => false
                    ]
                ); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="control">
            <div class="col-md-6">
                <?php echo $this->Form->input(
                    'password',
                    [
                        'type' => 'password',
                        'class' => 'form-control',
                        'placeholder' => 'Password',
                        'label' => false,
                        'required' => false
                    ]
                ); ?>
            </div>
            <div class="col-md-6">
                <?php echo $this->Form->input(
                    'cPassword',
                    [
                        'type' => 'password',
                        'class' => 'form-control',
                        'placeholder' => 'Confirm password',
                        'label' => false,
                        'required' => false
                    ]
                ); ?>
            </div>
        </div>
    </div>

    <div class="login-button text-center">
        <input type="submit" class="btn btn-primary" value="Signup">
    </div>

    <?php echo $this->Form->end(); ?>
</div>


<div class="login-footer">
    <span class="text-right color-white">
         Already have account
        <?php echo $this->Html->link('click here to signin', ['controller' => 'users', 'action' => 'login']); ?>
    </span>
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

<script>
    $(document).ready(function () {

        $('.datepicker').datepicker();

        //$('#investmentDollar').hide();
        //$('#ownProperties').hide();

        $('#role').on('change', function () {
            var value = $(this).val();
            if (value == 2) {
                $('.investmentDollar').hide();
                $('.investmentDollarType').hide();
                $('#ownProperties').show();
            }
            else if (value == 3) {
                $('#ownProperties').hide();
                $('.investmentDollar').show();
                $('.investmentDollarType').show();
            }
        });
    });
</script>

<?php $this->end(); ?>


