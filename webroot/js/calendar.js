/*
 * webroot/js/ready.js 
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */

// Overide Accept: header for jQuery to prevent unwanted json formated response
// Details: http://shiflett.org/blog/2011/may/the-accept-header
$.ajaxSetup({
    beforeSend: function(xhr, settings) {
        xhr.setRequestHeader('Accept', null);
    }
});

// Polling loop to reload events
function realodEvents() {
    setTimeout(function () {
        // Events reload
		console.log('Reloading calendar events...');
    	$('#calendar').fullCalendar( 'refetchEvents');
        realodEvents();
    }, 600000);
}

// JavaScript Document
$(document).ready(function() {

    // page is now ready, initialize the calendar...
    $('#calendar').fullCalendar({
		
		header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
		},
		editable: true,
		eventLimit: true, // allow "more" link when too many events
		lazyFetching: true,
		events: "/events/feed",
		dayRender: function(date, element, view){
    	   element.bind('dblclick', function() {
        	    var date = date;
        	});
    	},
    	dayClick: function(date, jsEvent, view) {
	
	        //alert('Clicked on: ' + date.format());
	        //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
	        //alert('Current view: ' + view.name);
	
	        // change the day's background color just for fun
	        //$(this).css('background-color', 'red');

    	},
    	//eventClick: function(calEvent, jsEvent, view) {
	
	        //alert('Event: ' + calEvent.title);
	        //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
	        //alert('View: ' + view.name);
	
	        // change the border color just for fun
	        //$(this).css('border-color', 'red');

    	//},
		eventRender: function(event, element) {
			//console.log("Event details: " + event.details);
        	if (event.details) {
	        	element.qtip({
					content: event.details,
					position: { 
						target: 'mouse',
						adjust: {
							x: 10,
							y: -5
						}
					},
					style: {
						name: 'light',
						tip: 'leftTop'
					}
	        	});
	        	element.bind('dblclick', function() {
         			alert('double click!');
      			});
	        	//console.log('Event added...');
        	}
    	},
		eventDragStart: function(event) {
			$(this).qtip("destroy");
		},
		eventDrop: function(event) {
			var startdate = new Date(event.start);
			var startyear = startdate.getFullYear();
			var startday = startdate.getDate();
			var startmonth = startdate.getMonth()+1;
			var starthour = startdate.getHours();
			var startminute = startdate.getMinutes();
			var enddate = new Date(event.end);
			var endyear = enddate.getFullYear();
			var endday = enddate.getDate();
			var endmonth = enddate.getMonth()+1;
			var endhour = enddate.getHours();
			var endminute = enddate.getMinutes();
			if(event.allDay == true) {
				var allday = 1;
			} else {
				var allday = 0;
			}
			var url = "/events/update?id="+event.id+"&start="+startyear+"-"+startmonth+"-"+startday+" "+starthour+":"+startminute+":00&end="+endyear+"-"+endmonth+"-"+endday+" "+endhour+":"+endminute+":00&allday="+allday;
			$.post(url, function(data){});
		},
		eventResizeStart: function(event) {
			$(this).qtip("destroy");
		},
		eventResize: function(event) {
			var startdate = new Date(event.start);
			var startyear = startdate.getFullYear();
			var startday = startdate.getDate();
			var startmonth = startdate.getMonth()+1;
			var starthour = startdate.getHours();
			var startminute = startdate.getMinutes();
			var enddate = new Date(event.end);
			var endyear = enddate.getFullYear();
			var endday = enddate.getDate();
			var endmonth = enddate.getMonth()+1;
			var endhour = enddate.getHours();
			var endminute = enddate.getMinutes();
			var url = "/events/update?id="+event.id+"&start="+startyear+"-"+startmonth+"-"+startday+" "+starthour+":"+startminute+":00&end="+endyear+"-"+endmonth+"-"+endday+" "+endhour+":"+endminute+":00";
			$.post(url, function(data){});
		}
    })
    
    // Set auto reload of events
    realodEvents();

	console.log("Calendar loaded...");
});
