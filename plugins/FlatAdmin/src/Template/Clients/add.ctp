<?php echo $this->assign('title', 'New Client'); ?>

<div class="page-title">
    <span class="title">New Client</span>
    <div class="description">Provide all information for adding  new clients</div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <?php
                    echo $this->Html->link('Clients List', ['controller' => 'clients', 'action' => 'index'], ['class' => 'btn btn-primary btn-theme', 'escape' => false]);
                    ?>
                </div>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create($client, array('controller' => 'clients', 'action' => 'add'));?>
                <form>

                    <div class="form-group">
                        <label>Client name</label>
                        <?php echo $this->Form->input('name', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Client name', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Website</label>
                        <?php echo $this->Form->input('website', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Website', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Email address</label>
                        <?php echo $this->Form->input('email', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Email address', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Phone number</label>
                        <?php echo $this->Form->input('phone', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Phone number', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Fax</label>
                        <?php echo $this->Form->input('fax', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Fax', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Street 1</label>
                        <?php echo $this->Form->input('street_1', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Street 1', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Street 2</label>
                        <?php echo $this->Form->input('street_2', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Street 2', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Country</label>
                        <select id="country" name="country" class="form-control select2-form-control" >
                            <option value="">Choose country</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>State</label>
                        <select name="state" id="state" class="form-control select2-form-control">
                            <option value="" hidden>Choose state</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>City</label>
                        <?php echo $this->Form->input('city', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'City', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Postal Code</label>
                        <?php echo $this->Form->input('postal_code', ['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Postal Code', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <?php echo $this->Form->input('password', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'label' => false, 'required' => false]);?>
                    </div>

                    <div class="form-group">
                        <label>Confirm password</label>
                        <?php echo $this->Form->input('cPassword', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Confirm password', 'label' => false, 'required' => false]);?>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Client</button>
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