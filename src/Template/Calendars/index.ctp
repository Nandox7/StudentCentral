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
?>

hello

<?php

echo $this->Html->script(array('jquery-1.5.min', 'jquery-ui-1.8.9.custom.min', 'fullcalendar.min', 'jquery.qtip-1.0.0-rc3.min', 'ready'));
echo $this->Html->css('fullcalendar.css');
echo $this->Html->css('fullcalendar_print.css');

?>

<div class="Calendar index">
	<div id="calendar"></div>
</div>
<div class="actions">
	<ul>
	    <li><?php echo $this->Html->link(__('New Event', true), array('events', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Manage Events', true), array('events')); ?></li>
		<li><?php echo $this->Html->link(__('Manage Events Types', true), array('event_types')); ?></li>
	</ul>
</div>
        <div>
            <script type='text/javascript'>

	            $(document).ready(function() {
		
            		$('#calendar').fullCalendar({
            			header: {
            				left: 'prev,next today',
            				center: 'title',
            				right: 'month,basicWeek,basicDay'
            			},
            			defaultDate: '2015-02-12',
            			editable: true,
            			eventLimit: true, // allow "more" link when too many events
            			events: [
            				{
            					title: 'All Day Event',
            					start: '2015-11-01'
            				},
            				{
            					title: 'Long Event',
            					start: '2015-11-07',
            					end: '2015-11-10'
            				},
            				{
            					id: 999,
            					title: 'Repeating Event',
            					start: '2015-11-09T16:00:00'
            				},
            				{
            					id: 999,
            					title: 'Repeating Event',
            					start: '2015-11-16T16:00:00'
            				},
            				{
            					title: 'Conference',
            					start: '2015-11-11',
            					end: '2015-11-13'
            				},
            				{
            					title: 'Meeting',
            					start: '2015-11-12T10:30:00',
            					end: '2015-11-12T12:30:00'
            				},
            				{
            					title: 'Lunch',
            					start: '2015-11-12T12:00:00'
            				},
            				{
            					title: 'Meeting',
            					start: '2015-11-12T14:30:00'
            				},
            				{
            					title: 'Happy Hour',
            					start: '2015-11-12T17:30:00'
            				},
            				{
            					title: 'Dinner',
            					start: '2015-11-12T20:00:00'
            				},
            				{
            					title: 'Birthday Party',
            					start: '2015-11-13T07:00:00'
            				},
            				{
            					title: 'Click for Google',
            					url: 'http://google.com/',
            					start: '2015-11-28'
            				}
            			]
            		});
            		
            	});

            </script>
                
                <div id='calendar' style='width: 900px; margin: 0 auto;'></div>
        </div>