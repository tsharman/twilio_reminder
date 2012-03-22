$(document).ready(function() {
	var reminderCounter = 0;
	$("#reminder").keyup(function() {
		$("#reminder_counter").html(140 - $(this).val().length);
	});
});
