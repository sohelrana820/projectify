<nav class="navbar navbar-default navbar-fixed-top navbar-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-expand-toggle">
                <i class="fa fa-bars icon"></i>
            </button>
            <ol class="breadcrumb navbar-breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
            <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                <i class="fa fa-th icon"></i>
            </button>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                <i class="fa fa-times icon"></i>
            </button>
            <!--<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-comments-o"></i></a>
                <ul class="dropdown-menu animated fadeInDown">
                    <li class="title">
                        Notification <span class="badge pull-right">0</span>
                    </li>
                    <li class="message">
                        No new notification
                    </li>
                </ul>
            </li>
            <li class="dropdown danger">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-star-half-o"></i> 4</a>
                <ul class="dropdown-menu danger  animated fadeInDown">
                    <li class="title">
                        Notification <span class="badge pull-right">4</span>
                    </li>
                    <li>
                        <ul class="list-group notifications">
                            <a href="#">
                                <li class="list-group-item">
                                    <span class="badge">1</span> <i class="fa fa-exclamation-circle icon"></i> new registration
                                </li>
                            </a>
                            <a href="#">
                                <li class="list-group-item">
                                    <span class="badge success">1</span> <i class="fa fa-check icon"></i> new orders
                                </li>
                            </a>
                            <a href="#">
                                <li class="list-group-item">
                                    <span class="badge danger">2</span> <i class="fa fa-comments icon"></i> customers messages
                                </li>
                            </a>
                            <a href="#">
                                <li class="list-group-item message">
                                    view all
                                </li>
                            </a>
                        </ul>
                    </li>
                </ul>
            </li>-->
            <li class="dropdown profile">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $loggedInUser->profile->name;?> <span class="caret"></span></a>
                <ul class="dropdown-menu animated fadeInDown">
                    <li class="profile-img">
                        <?php if(isset($loggedInUser->profile->profile_pic) && $loggedInUser->profile->profile_pic){
                            echo $this->Html->image('profiles/'.$loggedInUser->profile->profile_pic, ['class' => 'profile-img', 'alt' => $loggedInUser->profile->name, 'url' => ['controller' => 'users', 'action' => 'profile']]);
                        }
                        else{
                            echo $this->Html->image('dummy.jpg', ['class' => 'profile-img', 'alt' => 'Profile Photo', 'url' => ['controller' => 'users', 'action' => 'profile']]);
                        }
                        ?>
                    </li>
                    <li>
                        <div class="profile-info">
                            <h4 class="username"><?php echo $loggedInUser->profile->name;?></h4>
                            <p><?php echo $loggedInUser->username;?></p>
                            <div class="btn-group margin-bottom-2x" role="group">
                                <?php
                                echo $this->Html->link('<i class="fa fa-user"></i> Profile', ['controller' => 'users', 'action' => 'profile'], ['escape' => false, 'class' => 'btn btn-default']);
                                echo $this->Html->link('<i class="fa fa-sign-out"></i> Logout', ['controller' => 'users', 'action' => 'logout'], ['escape' => false, 'class' => 'btn btn-default']);
                                ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>