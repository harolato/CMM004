<div id="project-list" class="jumbotron">
    <h2>Hi, <?php echo AuthComponent::user('name');?>!</h2>
    <h4>Your projects:</h4>
    <ul class="list-group">
    <?php
        foreach( $projects_users[0]['Project'] as &$project ) {
            ?>
            <li class="list-group-item"><?php echo $this->Html->link($project['name'],[
                        'controller' => 'Projects',
                        $project['id']
                    ],[
                        'class' => 'btn btn-primary btn-md',
                        'role' => 'button'
                    ]);?>
             </li>
            <?php
        }
    ?>
    </ul>
</div>