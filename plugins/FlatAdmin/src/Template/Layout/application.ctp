<!DOCTYPE html>
<html>

<head>
    <title><?php echo $this->fetch('title');?> - <?php echo $title; ?></title>
    <?php echo $this->Html->meta('fav.png', '/img/fav.png', ['type' => 'icon']); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,600' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <?php echo $this->Html->css(['bootstrap.min', 'font-awesome.min', 'animate.min', 'bootstrap-switch.min', 'checkbox3.min', 'jquery.dataTables.min', 'dataTables.bootstrap', 'select2.min', ]); ?>
    <!-- CSS App -->
    <?php
    echo $this->Html->css(['style', 'flat-blue', 'custom']);
    echo $this->fetch('cssTop');
    echo $this->fetch('jsTop');
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load("current", {packages:['corechart']});
    </script>

</head>

<body class="flat-blue" ng-app="application">

<div class="app-container">
    <div class="row content-container">
        <?php echo $this->element('header');?>
        <?php echo $this->element('sidebar');?>
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">
                <?php echo $this->Flash->render() ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
    </div>
    <footer class="app-footer">
        <div class="wrapper">
            © 2016 Copyright.
        </div>
    </footer>
    <div>

<?php
echo $this->Html->script(['jquery.min', 'bootstrap.min', 'Chart.min', 'bootstrap-switch.min', 'jquery.matchHeight-min', 'jquery.dataTables.min', 'dataTables.bootstrap.min', 'select2.full.min', 'ace/ace', 'ace/mode-html', 'ace/theme-github', 'app']);
echo $this->fetch('jsBottom');
?>

</body>
</html>
