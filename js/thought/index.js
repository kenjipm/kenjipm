$(document).ready(function(e){
	init_element();
});

function init_element() {
	bind_thought_link();
}

function bind_thought_link() {
	$('#thought_content, #thought_posted_on').css('opacity', '0');
	
	$('.thought_link').on('click', function(e){
		$('.list-group-item').removeClass('active');
		$(this).addClass('active');
		
		scrollTo('#thought_title');
		
		var thought_id = $(this).attr('item_id');
		$('#thought_title').html(ajax_loader);
		$('#thought_content, #thought_posted_on').css('opacity', '0');
		
		$.ajax({
			url: 'get_thought_detail/',
			method: 'POST',
			data: {
				id: thought_id
			},
			success: function(response) {
				if (response.status == "success") {
					$("#thought_title").html(response.data.title);
					$("#thought_created_date").html(response.data.created_date_str);
					var rendered_content = response.data.content.replace(/\n/g, "<br />");
					$("#thought_content").html(rendered_content);
					$('#thought_content, #thought_posted_on').animate({
						opacity: 1
					}, 1000);
				} else {
					$("#thought_title").html("Sorry, failed to load content, please try again");
				}
			}
		});
	});
}