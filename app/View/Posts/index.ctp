<?php
foreach ( $data as &$post ) {
<<<<<<< HEAD
    echo $post['Post']['post'] .','. $this->Html->link('Delete', array('controller' => 'posts', 'action' => 'delete', $post['Post']['id'])) .'<br/>';
=======
    echo $post['Post']['post'] .' '. $this->Html->link('(x)', array('controller' => 'posts', 'action' => 'delete', $post['Post']['id'])) .'<br/>';
>>>>>>> student
}
?>