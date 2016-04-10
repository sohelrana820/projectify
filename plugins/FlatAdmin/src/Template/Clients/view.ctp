<?php echo $this->assign('title', $client->name); ?>

<div class="page-title">
    <span class="title">Client Details</span>
    <div class="description">All information of <?php echo $client->name?></div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <?php
                    echo $this->Html->link('New Client', ['controller' => 'clients', 'action' => 'add'], ['class' => 'btn btn-primary btn-theme', 'escape' => false]);

                    echo $this->Html->link('Clients List', ['controller' => 'clients', 'action' => 'index'], ['class' => 'btn btn-primary btn-theme', 'escape' => false]);

                    echo $this->Html->link('Edit Client', ['controller' => 'clients', 'action' => 'edit', $client->uuid], ['class' => 'btn btn-info btn-theme', 'escape' => false]);

                    echo $this->Html->link('Delete Client',
                        [
                            'controller' => 'clients',
                            'action' => 'delete',
                            $client->id
                        ],
                        [
                            'escape' => false,
                            'class' => 'btn btn-danger btn-theme',
                            'confirm' => __('Are you sure you want to delete this client?', $client->id)
                        ]
                    );
                    ?>
                </div>
            </div>
            <div class="card-body">

                <div class="step tabs-left card-no-padding">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="step" class="active">
                            <a href="#stepv1" id="step1-vtab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="false">
                                <div class="icon fa fa-user"></div>
                                <div class="step-title">
                                    <div class="title">General</div>
                                    <div class="description">Personal info</div>
                                </div>
                            </a>
                        </li>
                        <li role="step" class="">
                            <a href="#stepv2" role="tab" id="step2-vtab" data-toggle="tab" aria-controls="profile" aria-expanded="false">
                                <div class="icon fa fa-compass"></div>
                                <div class="step-title">
                                    <div class="title">Invoice</div>
                                    <div class="description">Employee information</div>
                                </div>
                            </a>
                        </li>
                        <li role="step" class="">
                            <a href="#stepv3" role="tab" id="step3-vtab" data-toggle="tab" aria-controls="profile" aria-expanded="true">
                                <div class="icon fa fa-book"></div>
                                <div class="step-title">
                                    <div class="title">Project</div>
                                    <div class="description">involved with this project</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="stepv1" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                    <?php if(isset($client->profile_pic) && $client->profile_pic){
                                        echo $this->Html->image('profiles/'.$client->profile_pic, ['class' => 'avatar img-thumbnail', 'alt' => $client->name, 'url' => ['controller' => 'clients', 'action' => 'view', $client->uuid]]);
                                    }
                                    else{
                                        echo $this->Html->image('profiles/dummy.jpg', ['class' => 'avatar img-thumbnail', 'alt' => 'Profile Photo', 'url' => ['controller' => 'clients', 'action' => 'view', $client->uuid]]);
                                    }
                                    ?>
                                </div>
                                <!-- edit form column -->
                                <div class="col-lg-9 col-sm-6 col-xs-12 personal-info">
                                    <ul class="data-list data-list-stripe">
                                        <li><strong>Name: </strong> <?php echo $client->name;?></li>
                                        <li>
                                            <strong>Website: </strong>
                                            <?php
                                            if($client->website){
                                                echo '<a href="'.$client->website.'" target="_blank" class="theme">'.$client->website.'</a>';
                                            }
                                            else{
                                                echo 'N/A';
                                            }
                                            ?>
                                        </li>
                                        <li><strong>Email: </strong> <?php echo $client->email;?></li>
                                        <li>
                                            <strong>Phone: </strong>
                                            <?php
                                            if($client->phone){
                                                echo $client->phone;
                                            }
                                            else{
                                                echo 'N/A';
                                            }
                                            ?>
                                        </li>
                                        <li>
                                            <strong>Fax: </strong>
                                            <?php
                                            if($client->fax){
                                                echo $client->fax;
                                            }
                                            else{
                                                echo 'N/A';
                                            }
                                            ?>
                                        </li>
                                        <li>
                                            <strong>Street 1: </strong>
                                            <?php
                                            if($client->street_1){
                                                echo $client->street_1;
                                            }
                                            else{
                                                echo 'N/A';
                                            }
                                            ?>
                                        </li>
                                        <li>
                                            <strong>Street 2: </strong>
                                            <?php
                                            if($client->street_2){
                                                echo $client->street_2;
                                            }
                                            else{
                                                echo 'N/A';
                                            }
                                            ?>
                                        </li>
                                        <li>
                                            <strong>City: </strong>
                                            <?php
                                            if($client->city){
                                                echo $client->street_2;
                                            }
                                            else{
                                                echo 'N/A';
                                            }
                                            ?>
                                        </li>
                                        <li>
                                            <strong>State: </strong>
                                            <?php
                                            if($client->state){
                                                echo $client->state;
                                            }
                                            else{
                                                echo 'N/A';
                                            }
                                            ?>
                                        </li>
                                        <li>
                                            <strong>Postal Code: </strong>
                                            <?php
                                            if($client->postal_code){
                                                echo $client->postal_code;
                                            }
                                            else{
                                                echo 'N/A';
                                            }
                                            ?>
                                        </li>
                                        <li>
                                            <strong>Country: </strong>
                                            <?php
                                            if($client->country){
                                                echo $client->country;
                                            }
                                            else{
                                                echo 'N/A';
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="stepv2" aria-labelledby="profile-tab">
                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="stepv3" aria-labelledby="dropdown1-tab">
                            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                        </div>
                    </div>
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