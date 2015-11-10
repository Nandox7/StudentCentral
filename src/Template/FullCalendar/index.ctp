<?php
/*
 * View/FullCalendar/index.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
            echo $this->Html->script('moment.min.js');
            echo $this->Html->script('jquery.min.js');
            echo $this->Html->script('fullcalendar.min.js');
            echo $this->Html->script('calendar.js');
            echo $this->Html->css('fullcalendar.css');
            echo $this->Html->css('tasks.css');
            echo $this->Html->css('newstyle.css');
?>


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
