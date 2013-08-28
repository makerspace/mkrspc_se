$(function() {

	$("#urlform").submit(function() {
		
		var url = $("#url").val();
		
		$("#result").show().html("<i>Vänligen vänta medans din nya URL genereras...</i>");
		
		$.post("s", { "url": url })
			.done(function(data) {
				$("#result").html('Förkortad länk: <a href="' + data + '">' + data + '</a>');
			})
			.fail(function(data) {
				$("#result").html('<i>Kunde inte skapa en kortare URL - kontrollera att du fyllde i en korrekt URL</i>');
			});
			
		return false;
	});

});
