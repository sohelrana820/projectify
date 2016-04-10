<?php if (isset($params) AND isset($params['errors'])) : ?>
    <div class="alert alert-warning">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul class="list-group">
            <?php foreach ($params['errors'] as $error) : ?>
                <li class="list-group-item list-group-item-danger"><i class="fa fa-exclamation-triangle"></i> <?= h($error) ?></li>
            <?php endforeach; ?>
        </ul>
        <br>
        <button class="btn btn-default center-block" data-dismiss="alert" aria-hidden="true">Close</button>
    </div>

<?php endif; ?>
