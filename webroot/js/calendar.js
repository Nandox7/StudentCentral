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
		dayClick: function() {
        	alert('a day has been clicked!');
        	console.log("Day clicked...");
    	},
		eventRender: function(event, element) {
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

});

console.log("Calendar loaded...");
