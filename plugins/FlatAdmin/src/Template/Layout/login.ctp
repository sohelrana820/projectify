<!DOCTYPE html>
<html>

<head>
    <title>Flat Admin V.2 - Free Bootstrap Admin Templates</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <?php echo $this->Html->css(['bootstrap.min', 'font-awesome.min', 'animate.min', 'bootstrap-switch.min', 'checkbox3.min', 'jquery.dataTables.min', 'dataTables.bootstrap', 'select2.min', ]); ?>
    <!-- CSS App -->
    <?php echo $this->Html->css(['style', 'flat-blue']); ?>

</head>

<body class="flat-blue login-page">
<div class="container">
    <div class="login-box">
        <div>
            <div class="login-form row">
                <div class="col-sm-12 text-center login-header">
                    <i class="login-logo fa fa-connectdevelop fa-5x"></i>
                    <h4 class="login-title">Flat Admin V2</h4>
                </div>
                <div class="col-sm-12">
                    <div class="login-body">
                        <div class="progress hidden" id="login-progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                Log In...
                            </div>
                        </div>
                        <form>
                            <div class="control">
                                <input type="text" class="form-control" value="admin@gmail.com" />
                            </div>
                            <div class="control">
                                <input type="password" class="form-control" value="123456" />
                            </div>
                            <div class="login-button text-center">
                                <input type="submit" class="btn btn-primary" value="Login">
                            </div>
                        </form>
                    </div>
                    <div class="login-footer">
                        <span class="text-right"><a href="#" class="color-white">Forgot password?</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Javascript Libs -->
<?php
echo $this->Html->script(['jquery.min.', 'bootstrap.min', 'Chart.min', 'bootstrap-switch.min', 'jquery.matchHeight-min', 'jquery.dataTables.min', 'dataTables.bootstrap.min', 'select2.full.min', 'ace/ace', 'ace/mode-html', 'ace/theme-github', 'app']);
?>

</body>
</html>
