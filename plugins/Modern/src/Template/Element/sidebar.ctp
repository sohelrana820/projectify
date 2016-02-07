<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="active">
            <?php echo $this->Html->link('<i class="fa fa-fw fa-dashboard"></i> Dashboard', ['controller' => 'dashboard', 'action' => 'index'], ['escape' => false]); ?>
        </li>
        <li>
            <?php echo $this->Html->link('<i class="fa fa-fw fa-plus"></i> Add User', ['controller' => 'users', 'action' => 'add'], ['escape' => false]); ?>
        </li>
        <li>
            <?php echo $this->Html->link('<i class="fa fa-fw fa-signal"></i> User List', ['controller' => 'users', 'action' => 'index'], ['escape' => false]); ?>
        </li>
    </ul>
</div>