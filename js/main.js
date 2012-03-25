$(document).ready(function() {
	var reminderCounter = 0;
	$("#reminder").keyup(function() {
		if((140 - $(this).val().length) <= 0) {
			$("#reminder_counter").css("color", "red");
		}
		else {
			$("#reminder_counter").css("color", "black");
		}
		$("#reminder_counter").html(140 - $(this).val().length);
	});
	$("#send_reminder").click(function() {
		var phone = $("#phone_number").val();
		var message = $("#reminder").val();
		var time = $("#time").val();
		time = time.split(" ");
		
		timeVal = time[0];
		timeUnit = time[1];
		console.log(timeVal);
		if(timeUnit != "minutes" && timeUnit != "hours" && timeUnit != "days") {
			$("#error_units").slideDown();
			return;
		}

	
		$.ajax({
			type: "POST",
			url: "../ajax/submit_reminder.php",
			data: "timeVal=" + timeVal + "&timeUnit=" + timeUnit + "&phone=" + phone + "&message=" + message,
			success: function(msg) {
				console.log(msg);
			}
		});
	});
	

});
