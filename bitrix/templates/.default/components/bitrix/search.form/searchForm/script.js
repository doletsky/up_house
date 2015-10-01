$(document).ready(function(e) {
	$('#header_search_form_submit').click(function(e) {
		e.preventDefault();
		$('#header_search_form').submit();
	});
});