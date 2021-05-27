$(document).ready(function() {
	$("input[type='file']").change(function(){
		if($("#file").val().length != 0) {
			$("label").html($("#file").val().substr(12));
		}
	});
});