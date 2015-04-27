
<div class="row">
    <div class="col-md-12 "><h2>Project title: <?php echo $project_title['Project']['name'];?></h2></div>
    <div class="col-md-12 "><?php echo $this->Html->link('Burndown chart', [
            'controller' => 'Pages',
            'action' => 'display',
            'burndown',$project_title['Project']['id']
        ],[
            'class' => 'btn btn-primary btn-large'
        ]);?>
        <button class="btn btn-primary btn-small">Add people</button>
        <?php echo $this->Html->link('Add New Task', [
                    'controller' => 'Tasks',
                    'action' => 'add',
                    $project_title['Project']['id']
                ],[
                    'class' => 'btn btn-md btn-primary'
                ])?>
    </div>

</div>
<br>
<div class="row">
    <div class="col-md-12"><h3>Team members:</h3></div>
</div>
<div class="row">

    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Role</th>
            </tr>
            <?php foreach($projectusers[0]['User'] as &$user ){ ?>
                    <tr>
                        <td><?php echo $user['name'];?></td>
                        <td><?php echo $user['ProjectsUser']['role'];?></td>
                    </tr>
                <?php
                }
            ?>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-left"><h3>Task list:</h3></div>

</div>
<table class="table table-hover table-bordered">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Points</th>
        <th>State</th>
        <th>Date Addedd</th>
        <th>Person responsible</th>
        <th>Actions</th>
    </tr>

<?php
foreach ($tasks as &$task) {
    if ( count($task['User']) > 0 ) {
        $userName = true;
    } else {
        $userName = false;
    }
?>
    <tr<?php echo ($task['Task']['state'] == 'complete')?' class="success"':'';?>>
        <td><?php echo $task['Task']['name'];?></td>
        <td><?php echo $task['Task']['description'];?></td>
        <td><?php echo $task['Task']['points'];?></td>
        <td><?php echo $task['Task']['state'];?></td>
        <td><?php echo $task['Task']['date_added'];?></td>
        <td><?php echo ($userName) ? $task['User'][0]['name'] : 'N/A';?></td>
        <td><?php
            if ( $task['Task']['state'] != 'complete' ){
                if ( !$userName ) {
                    echo $this->Html->link('Assign me', [
                        'controller' => 'Tasks',
                        'action' => 'assign',
                        $task['Task']['id'],
                        $currentUser['id']
                    ]);

                } else {
                    if ( $currentUser['id'] == $task['User'][0]['id'] ) {
                        echo $this->Html->link('Unassign me', [
                            'controller' => 'Tasks',
                            'action' => 'unassign',
                            $task['User'][0]['TasksUser']['id']
                        ]);
                        echo $this->Html->link(' <span class="glyphicon glyphicon-ok"></span>', [
                            'controller' => 'Tasks',
                            'action' => 'signOffTask',
                            $task['Task']['id']
                        ],[
                            'escape' => false
                        ]);
                    }
                }
                echo (($project_role['ProjectsUser']['role'] == "owner")? $this->Html->link(' <span class="glyphicon glyphicon-trash"></span>', [
                    'controller' => 'Tasks',
                    'action' => 'remove',
                    $task['Task']['id']
                ],[
                    'escape' => false
                ]) :'');

            }
            if ( $currentUser['id'] == @$task['User'][0]['id']) {
                echo $this->Html->link(' <span class="glyphicon glyphicon-comment"></span>', [
                    'controller' => 'Tasks',
                    'action' => 'writeNote',
                    $task['User'][0]['TasksUser']['id']
                ],[
                    'escape' => false
                ]);
            }
            ?>
        </td>
    </tr>
<?php
}
?>
</table>