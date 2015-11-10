        <?php
            echo $this->Html->script('moment.min.js');
            echo $this->Html->script('jquery.min.js');
            echo $this->Html->script('fullcalendar.min.js');
            echo $this->Html->script('calendar.js');
            echo $this->Html->css('fullcalendar.css');
            echo $this->Html->css('tasks.css');
            echo $this->Html->css('newstyle.css');
        ?>
        
        <div class="mdl-grid">
          <!-- Calendar -->
          <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
            <div id="calendar-block">
                    <div id='calendar'></div>
            </div>
          </div>
          <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                <h2 class="mdl-card__title-text">Today's Events</h2>
              </div>
              <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                See today's events...
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">See Events</a>
              </div>
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
           <div class="col s12 m12 l4">
                  <ul id="task-card" class="collection with-header">
                      <li class="collection-header cyan">
                          <h4 class="task-card-title">My Task</h4>
                          <p class="task-card-date">March 26, 2015</p>
                      </li>
                      <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                          <input type="checkbox" id="task1">
                          <label for="task1" style="text-decoration: none;">Create Mobile App UI. <a href="#" class="secondary-content"><span class="ultra-small">Today</span></a>
                          </label>
                          <span class="task-cat teal">Mobile App</span>
                      </li>
                      <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                          <input type="checkbox" id="task2">
                          <label for="task2" style="text-decoration: none;">Check the new API standerds. <a href="#" class="secondary-content"><span class="ultra-small">Monday</span></a>
                          </label>
                          <span class="task-cat purple">Web API</span>
                      </li>
                      <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                          <input type="checkbox" id="task3" checked="checked">
                          <label for="task3" style="text-decoration: line-through;">Check the new Mockup of ABC. <a href="#" class="secondary-content"><span class="ultra-small">Wednesday</span></a>
                          </label>
                          <span class="task-cat pink">Mockup</span>
                      </li>
                      <li class="collection-item dismissable" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                          <input type="checkbox" id="task4" checked="checked" disabled="disabled">
                          <label for="task4" style="text-decoration: line-through;">I did it !</label>
                          <span class="task-cat cyan">Mobile App</span>
                      </li>
                  </ul>
              </div>
              <div class="mdl-card__actions mdl-card--border">

              </div>
            </div>
          </div>
        </div>
      </main>
    </div>