$(document).ready(function() {
	$.get("https://v2.jokeapi.dev/joke/Any?format=txt&type=single", function(data) {
		$("#random-quote").text("\"" + data + "\"");
	});
});