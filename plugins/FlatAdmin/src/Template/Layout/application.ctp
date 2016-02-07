<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $this->fetch('title');?> - <?php echo $title; ?></title>
    <?php echo $this->Html->css(array('bootstrap.min', 'sb-admin', 'plugins/morris', 'font-awesome/css/font-awesome', 'style.css'));?>
    <?php echo $this->fetch('cssTop'); ?>
    <?php echo $this->fetch('jsTop'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php echo $this->Html->link($appsName, ['controller' => 'dashboard', 'action' => 'index'], ['class' => 'navbar-brand']);?>
        </div>
        <!-- Top Menu Items -->
        <?php echo $this->element('header');?>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php echo $this->element('sidebar');?>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <?php echo $this->fetch('content'); ?>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<?php echo $this->Html->script(array('jquery', 'bootstrap.min', 'plugins/morris/raphael.min', 'plugins/morris/morris.min', 'plugins/morris/morris-data'));?>
<?php echo $this->fetch('jsBottom'); ?>
</body>
</html>