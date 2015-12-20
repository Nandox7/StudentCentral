        <?php

            echo $this->Html->css('fullcalendar.css');
            
            echo $this->Html->script('moment.min.js');
            echo $this->Html->script('jquery.min.js');
            echo $this->Html->script('fullcalendar.min.js');
            echo $this->Html->script('calendar.js');

        ?>
        
        <div class="mdl-grid">

          <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
            <!-- Calendar -->
            <div id="calendar"></div>
          </div>
          <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                <h2 class="mdl-card__title-text">Today's</h2>
              </div>
              <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                See today's events...
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="/events/add" class="mdl-button mdl-js-button mdl-js-ripple-effect">Create Event</a>
                </br>
                <a href="/events/" class="mdl-button mdl-js-button mdl-js-ripple-effect">See All Events</a>
              </div>
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
          
              <div class="mdl-card__actions mdl-card--border">
			</div>
			
          </div>
        </div>
      </main>
    </div>