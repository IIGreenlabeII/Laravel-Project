var click = "click"; // Set to tap for mobile devices
$(function(){
	// Global var
	var location = document.location.href;
	var page = location.split('.nl/');
	var $loading = $("#loading");

	if( page[1] == 'blog' ) {
		// Load app
		setTimeout(function(){
			$loading.addClass('hide');
			setTimeout(function(){
				$loading.hide();
			},300);
		},2000);
	} else {
		$loading.hide();
	}
	$("body").find(".clickable").on(click, function(){
		document.location = $(this).find("a").first().attr("href");
	});
	// Finder for which category
	$("#blog").find("li").on(click, function(){
		document.location = $(this).find("a").attr("href");
	});
	// Finder for which category
	$("#menu").find("li").on(click, function(){
		document.location = $(this).find("a").attr("href");
	});
	// When the li element is active
	$("#header").find(".menu").on(click, function(){
		$("#app").toggleClass("active");
	});
	// up and down slider for de img
	$(".section").find(".image").on(click, function(){
		var $image = $(this).find("img");
		if( $image.height() != $(this).height() ) {
			$(this).animate( { height : $image.height() }, 300 );
		} else {
			$(this).animate( { height : 100 }, 300 );
		}
	});

	// Show more reactions
	$(".moreReactions").on(click, function(){
		$(this).parent().find(".blogReaction").addClass("active");
		$(this).hide();
		$(this).parent().find(".hideReactions").show();
	});
	// Hide the reactions
	$(".hideReactions").on(click, function(){
		$(this).parent().find(".blogReaction").removeClass("active");
		$(this).parent().find(".blogReaction").first().addClass("active");
		$(this).hide();
		$(this).parent().find(".moreReactions").show();
	});
	// The button to place a reaction
	$(".submitReaction").on(click, function(){
		var $current = $(this).parent();
		var name = $current.find("input.name").val();
		var email = $current.find("input.email").val();
		var reaction = $current.find("textarea.reaction").val();
		var blogId = $current.find("input.blog_id").val();
		if( name != '' && email != '' && reaction != '' ) {
			if( validateEmail(email) ) {
				// Set location live or test
				if( location.match(/test2.u-lab.nl/) ) {
					location = 'http://viagroep.test2.u-lab.nl';
				} else {
					location = 'http://m.viagroep.nl';
				}
				// Ajax call to the server
				$.ajax({
					crossDomain: true,
					type: 'POST',
					url: location+'/blog/save',
					data: 'name='+name+'&email='+email+'&reaction='+reaction+'&blog_id='+blogId,
					success: function(response){
						if( response != 'false' ) {
							alert("Bedankt voor uw reactie. Na goedkeuring wordt uw reactie getoond.");

							$current.find("input.name").val('');
							$current.find("input.email").val('');
							$current.find("textarea.reaction").val('');
						} else {
							alert("Vul alstublieft uw naam, e-mailadres en een reactie van minimaal 15 tekens in.");
						}
					},
					error: function(e){
						alert("Er ging iets mis bij het opslaan, probeer het nogmaals.");
					}
				});
			} else {
				alert("Vul alstublieft een geldig e-mailadres in");
			}
		} else {
			alert("Vul alstublieft eerst uw naam, e-mailadres en een reactie in");
		}
	});
});
// validator for the email
function validateEmail(email) {
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}