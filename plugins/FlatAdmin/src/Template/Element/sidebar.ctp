<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/dashboard">
                    <div class="icon fa fa-home"></div>
                    <div class="title">
                        <?php echo $this->Html->image('logo.png', ['class' => 'logo']); ?>
                    </div>
                </a>
                <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                    <i class="fa fa-times icon"></i>
                </button>
            </div>
            <ul class="nav navbar-nav">

                <li <?php if ($this->request->controller == 'Dashboard' && $this->request->action == 'index') {
                    echo 'class="active"';
                }; ?>>
                    <?php echo $this->Html->link(
                        '<span class="icon fa fa-tachometer"></span><span class="title">Dashboard</span>',
                        ['controller' => 'dashboard', 'action' => 'index'],
                        ['escape' => false]
                    ) ?>
                </li>

                <li <?php if ($this->request->controller == 'Users' && $this->request->action == 'index') {
                    echo 'class="active"';
                }; ?>>
                    <?php echo $this->Html->link(
                        '<span class="icon fa fa-users"></span><span class="title">Users</span>',
                        ['controller' => 'users', 'action' => 'index'],
                        ['escape' => false]
                    ) ?>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</div>