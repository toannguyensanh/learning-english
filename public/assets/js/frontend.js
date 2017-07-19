$(document).ready(function() {
	$("#button-check-result").click(function() {
		$("#button-show-result").removeClass("hidden");
		$(".input-content").each(function() {
			var result = $(this).parent().find(".input-result").val();
			if($(this).val() == result) {
				$(this).parents(".form-group").find(".hide-check-true").removeClass('hidden');
				console.log("true");
			}
			else {
				$(this).parents(".form-group").find(".hide-check-false").removeClass('hidden');
				console.log(false);
			}
		});
	});

	$("#button-show-result").click(function() {
		$(".hide-result").removeClass("hidden");
	});
});