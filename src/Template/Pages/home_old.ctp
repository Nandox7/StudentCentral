<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;

$cakeDescription = 'Student Central';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->script('jquery-1.5.min.js'); ?>
    <?= $this->Html->script('fullcalendar.min.js'); ?>
    <?= $this->Html->script('ready.js'); ?>
    <?= $this->Html->css('fullcalendar.css'); ?> 
    <?= $this->Html->css('fullcalendar_print.css'); ?> 
</head>
<body class="home">
    <header>
        <div class="header-image">
            <?= $this->Html->image('/img/StudentCentralLogo.png') ?>
            <h1>Student Central<br>Main Page</h1>
        </div>
    </header>
        <div>
            <li><?= $this->Html->link(__('List Colleges'), ['controller' => 'Colleges', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        </div>
        <div class="Calendar index">
        	<div id="calendar"></div>
        </div>
        <div class="actions">
        	<ul>
        	    <li><?php echo $this->Html->link(__('New Event', true), array('controller' => 'events', 'action' => 'add')); ?></li>
        		<li><?php echo $this->Html->link(__('Manage Events', true), array('controller' => 'events')); ?></li>
        		<li><?php echo $this->Html->link(__('Manage Events Types', true), array('controller' => 'event_types')); ?></li>
        	</ul>
        </div>
    <footer>
    </footer>
</body>
</html>
