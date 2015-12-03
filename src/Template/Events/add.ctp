<?php
    echo $this->Html->script('jquery.min.js');
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Event Types'), ['controller' => 'EventTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event Type'), ['controller' => 'EventTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="events form large-9 medium-8 columns content">
    <?= $this->Form->create($event) ?>
    <fieldset>
    	<br/>
        <legend><?= __('Add Event') ?></legend>
        <div class="input select">
            <label for="event_audience">Event Audience </label>
            <select name="event_audience" id="event_audience">
                <option value="Personal">Personal</option>
                <option value="Group">Group</option>
                <option value="Course">Course</option>
            </select>
        </div>
        <br/>
        <?php 
            echo $this->Form->input('group_id', ['options' => $myGroups]);
            echo "<br/>";
            echo $this->Form->input('event_type_id', ['options' => $eventTypes]);
            echo "<br/>";
            echo $this->Form->input('title');
            echo "<br/>";
            echo $this->Form->input('details');
            echo "<br/>";
            echo $this->Form->input('start');
            echo "<br/>";
            echo $this->Form->input('end');
            echo "<br/>";
            echo $this->Form->input('all_day');
            echo "<br/>";
            echo $this->Form->input('active');
            echo "<br/>";
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <button type = "submit" class="mdl-button mdl-js-button mdl-button--raised">Save</button>
    <?= $this->Form->end() ?>
</div>

<button type = "submit" class="mdl-button mdl-js-button mdl-button--raised">Save</button>

        <script type='text/javascript'>
            // jQuery code to enable select
            $(document).ready(function() {
                $('#group-id').attr('disabled','disabled');        
                $('select[name="event_audience"]').on('change',function(){
                var  choice = $(this).val();
                    if(choice == "Group"){           
                        $('#group-id').removeAttr('disabled');          
                    }else{
                        $('#group-id').attr('disabled','disabled'); 
                    }
                });
            });
        </script>