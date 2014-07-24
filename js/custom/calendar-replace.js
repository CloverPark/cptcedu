//puts the various calendar dates into AP style
$(document).ready(function () {
	$(function () {
	var events = $('.home-events-date-wrapper');
    events.html(events.html().replace(/20\d\d/g, ''));
    events.html(events.html().replace(/-01-/g, '<span class="home-events-month">JAN</span>'));
    events.html(events.html().replace(/-02-/g, '<span class="home-events-month">FEB</span>'));
    events.html(events.html().replace(/-03-/g, '<span class="home-events-month">MAR</span>'));
    events.html(events.html().replace(/-04-/g, '<span class="home-events-month">APR</span>'));
    events.html(events.html().replace(/-05-/g, '<span class="home-events-month">MAY</span>'));
    events.html(events.html().replace(/-06-/g, '<span class="home-events-month">JUN</span>'));
    events.html(events.html().replace(/-07-/g, '<span class="home-events-month">JUL</span>'));
    events.html(events.html().replace(/-08-/g, '<span class="home-events-month">AUG</span>'));
    events.html(events.html().replace(/-09-/g, '<span class="home-events-month">SEP</span>'));
    events.html(events.html().replace(/-10-/g, '<span class="home-events-month">OCT</span>'));
    events.html(events.html().replace(/-11-/g, '<span class="home-events-month">NOV</span>'));
    events.html(events.html().replace(/-12-/g, '<span class="home-events-month">DEC</span>'));
    events.html(events.html().replace(/\d\d:\d\d:\d\d/g, ''));
	events.html(events.html().replace(/ 0/g, ' '));
	});
	
	$(function () {
    var div = $('.date-display-single');
    div.html(div.html().replace(' pm', ' p.m.'));
    div.html(div.html().replace(' am', ' a.m.'));
	});
});

