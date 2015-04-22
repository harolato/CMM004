<div class="jumbotron">
    <h1>Hi, <?php echo AuthComponent::user('name');?>!</h1>
    <p>Here are your projects:</p>
    <?php
        foreach( $projects_users[0]['Project'] as &$project ) {
            ?>
            <p><?php echo $this->Html->link($project['name'],[
                        'controller' => 'Projects',
                        $project['id']
                    ],[
                        'class' => 'btn btn-primary btn-md',
                        'role' => 'button'
                    ]);?></p>
            <?php
        }
    ?>
</div>