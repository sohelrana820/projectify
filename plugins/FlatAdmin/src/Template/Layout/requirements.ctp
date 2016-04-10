<html>
<head>
    <title><?php echo $this->fetch('title');?> - Strastic</title>

    <?php echo $this->Html->css(['bootstrap.min', 'font-awesome.min', 'animate.min']); ?>

    <?php echo $this->Html->css(['multi_step']); ?>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->fetch('content'); ?>

        </div>
    </div>
</div>

<!-- multistep form -->

<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<?php echo $this->Html->script(['multi_step']); ?>
</body>

</html>