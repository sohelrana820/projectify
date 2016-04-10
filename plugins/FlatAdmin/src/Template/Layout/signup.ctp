<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Strastic">
    <meta name="keyword" content="Strastic">

    <title><?php echo $this->fetch('title');?> - <?php echo $title; ?></title>
    <link rel="shortcut icon" href="/img/strastic-logo.png" type="image/x-icon"/>

    <!-- Bootstrap core CSS -->
    <?php echo $this->Html->css(array('bootstrap.min', 'signup'));?>
    <link href='https://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php echo $this->Html->script(array('jquery.min', 'bootstrap.min' , 'datepicker'));?>
</head>
<?php $bg = $this->Utilities->getBackgroundFromAction($this->request->action); ?>

<body class="body <?php echo $bg; ?>">
<?php echo $this->Flash->render() ?>
<section class="container">
    <div class="col-lg-10 col-lg-offset-1">
        <div class="content-area">
            <?php echo $this->Html->image('/img/strastic-logo.png',
                [
                    'url' => ['controller' => 'users', 'action' => 'login'],
                    'class' => 'main-logo'

                ]
            ); ?>

            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
</section>

<!-- js placed at the end of the document so the pages load faster -->

<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

<script>
    $(document).ready(function () {

        $('.datepicker1').datepicker();
        $('.datepicker2').datepicker();
    });
</script>

</body>
</html>