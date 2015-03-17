<?php
foreach ( $data as &$post ) {
    echo $post['Post']['post'] .'Hello !!!!!! '. $this->Html->link('(x)', array('controller' => 'posts', 'action' => 'delete', $post['Post']['id'])) .'<br/>';
}
?>