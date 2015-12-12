
// Code for about.html
// .fadeIn( [duration ] [, complete ] )
//------------------------------------------------------------

$(document).ready(function () {
	$("#alien1").click(function(x){
		x.preventDefault(); // stops the href
		var link_url = $(this).attr("href");  // copy the url in the href
		$("#message").load(link_url + " #alien1", function() {  // from the href page, copy the bio_desc content
			$("#message").hide().slideDown(2000);  // show bio_desc in the bio id with fade of 2 min.
		});
	});
});

//------------------------------------------------------------
// there is an error after the the fadeIn is finished
// the nav from the href is showing ???????

