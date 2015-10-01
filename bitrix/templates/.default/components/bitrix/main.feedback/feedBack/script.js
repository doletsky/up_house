$(document).ready(function() {
	$('#feedbackFormSubmit').click(function(e) {
		e.preventDefault();
		$('#feedbackForm').submit();
	});
});