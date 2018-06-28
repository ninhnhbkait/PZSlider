<?php
    echo $this->Form->create('Valid', array('url' => 'vidu3'));
    echo $this->Form->input('name');
    echo $this->Form->input('email');
    echo $this->Form->end('Check');
?>